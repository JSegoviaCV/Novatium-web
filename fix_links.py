
import os
import re

def fix_links(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".html"):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()

                # Remove data-bs-toggle="dropdown" from elements with class="navbar-link is-overview"
                new_content = re.sub(r'(class="navbar-link is-overview"[^>]*)\s+data-bs-toggle="dropdown"', r'\1', content)
                new_content = re.sub(r'data-bs-toggle="dropdown"\s+(class="navbar-link is-overview")', r'\1', new_content)

                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    print(f"Fixed links in {filepath}")

if __name__ == "__main__":
    fix_links(".")
