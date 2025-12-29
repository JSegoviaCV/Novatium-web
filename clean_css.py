import re

# This function finds all top-level CSS rules. It handles nested blocks by counting braces.
def find_css_rules(content):
    rules = []
    pos = 0
    while pos < len(content):
        try:
            selector_end = content.index('{', pos)
            block_start = selector_end + 1
        except ValueError:
            break

        selector_part = content[pos:selector_end]

        # We need to handle comments in the selector part
        selector_part = re.sub(r'/\*.*?\*/', '', selector_part, flags=re.DOTALL)
        selector = selector_part.strip()

        # Find matching brace
        brace_level = 1
        search_pos = block_start
        while search_pos < len(content):
            if content[search_pos] == '{':
                brace_level += 1
            elif content[search_pos] == '}':
                brace_level -= 1

            if brace_level == 0:
                break
            search_pos += 1
        else:
            # Unterminated block, stop parsing
            break

        block_end = search_pos
        properties = content[block_start:block_end].strip()

        if selector and not selector.startswith('@'):
             rules.append({
                 'selector': selector,
                 'properties': properties,
                 'start_pos': pos,
                 'end_pos': search_pos + 1
             })

        pos = search_pos + 1

    return rules

def merge_properties(prop_blocks):
    final_props = {}
    for block in prop_blocks:
        # Find property-value pairs
        pairs = re.findall(r'([a-zA-Z0-9_-]+)\s*:\s*([^;]+);?', block)
        for name, value in pairs:
            final_props[name.strip()] = value.strip()

    # Format for output
    return '\\n' + ';\\n'.join([f'    {name}: {value}' for name, value in final_props.items()]) + ';\\n'

def main():
    selectors_to_merge = [
        '.card.is-next-cta',
        '.card.is-next-cta1',
        'input',
        '.btn'
    ]

    with open('css/style.css', 'r', encoding='utf-8') as f:
        content = f.read()

    rules = find_css_rules(content)

    # Group rules by selector
    grouped_rules = {}
    for rule in rules:
        s = rule['selector']
        if s not in grouped_rules:
            grouped_rules[s] = []
        grouped_rules[s].append(rule)

    # Replacements will be stored as (start, end, new_text)
    replacements = []

    for selector_group, rule_list in grouped_rules.items():
        # Exact match for single selectors
        if selector_group in selectors_to_merge and len(rule_list) > 1:
            print(f"Merging {len(rule_list)} blocks for selector '{selector_group}'")

            prop_blocks = [r['properties'] for r in rule_list]
            merged_props = merge_properties(prop_blocks)
            new_rule_text = f"{selector_group} {{ {merged_props}}} "

            # Replace the last occurrence
            last_rule = rule_list[-1]
            replacements.append((last_rule['start_pos'], last_rule['end_pos'], new_rule_text))

            # Mark others for deletion
            for rule in rule_list[:-1]:
                replacements.append((rule['start_pos'], rule['end_pos'], ''))

    # Apply replacements from the end of the file to the start to avoid index issues
    replacements.sort(key=lambda x: x[0], reverse=True)

    content_list = list(content)
    for start, end, new_text in replacements:
        content_list[start:end] = list(new_text)

    cleaned_content = "".join(content_list)

    # Remove extra newlines
    cleaned_content = re.sub(r'\\n\\s*\\n', '\\n', cleaned_content)

    with open('css/style_cleaned.css', 'w', encoding='utf-8') as f:
        f.write(cleaned_content)

if __name__ == "__main__":
    main()
