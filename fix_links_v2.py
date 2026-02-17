
import os
import re

def fix_links_v2(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".html"):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()

                # Remove data-bs-target and aria-controls from elements with class="navbar-link is-overview"
                new_content = re.sub(r'(class="navbar-link is-overview"[^>]*)\s+data-bs-target="[^"]*"', r'\1', content)
                new_content = re.sub(r'(class="navbar-link is-overview"[^>]*)\s+aria-controls="[^"]*"', r'\1', new_content)
                new_content = re.sub(r'(class="navbar-link is-overview"[^>]*)\s+aria-expanded="[^"]*"', r'\1', new_content)
                new_content = re.sub(r'(class="navbar-link is-overview"[^>]*)\s+role=button', r'\1', new_content)

                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    # print(f"Cleaned up {filepath}")

if __name__ == "__main__":
    fix_links_v2(".")
