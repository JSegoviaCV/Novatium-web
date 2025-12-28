
from playwright.sync_api import sync_playwright

def run():
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()
        try:
            # Navigate to the local server
            page.goto("http://localhost:8080")

            # Wait for the preloader to disappear
            page.wait_for_selector("#preloader", state="hidden", timeout=10000)

            # Take a screenshot
            page.screenshot(path="screenshot_after_update.png")
            print("Screenshot taken successfully.")
        except Exception as e:
            print(f"An error occurred: {e}")
        finally:
            browser.close()

if __name__ == "__main__":
    run()
