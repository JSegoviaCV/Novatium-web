
import os
import re

def update_swiper(directory):
    for root, dirs, files in os.walk(directory):
        for file in files:
            if file.endswith(".html"):
                filepath = os.path.join(root, file)
                with open(filepath, 'r', encoding='utf-8') as f:
                    content = f.read()

                # Replace any swiper@... with swiper@11.1.15
                new_content = re.sub(r'swiper@[0-9.]+', 'swiper@11.1.15', content)

                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    print(f"Updated Swiper in {filepath}")

if __name__ == "__main__":
    update_swiper(".")
