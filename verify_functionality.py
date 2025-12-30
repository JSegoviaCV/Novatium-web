from playwright.sync_api import sync_playwright
import time

def take_screenshots(playwright):
    browser = playwright.chromium.launch()
    page = browser.new_page()

    # Navigate to the index page and take a screenshot
    page.goto("http://localhost:8080/index.html")
    time.sleep(5)  # Wait for the page to load
    page.screenshot(path="screenshot_index.png")

    # Navigate to the contact page and take a screenshot
    page.goto("http://localhost:8080/lang_es/contact.html")
    time.sleep(5)  # Wait for the page to load
    page.screenshot(path="screenshot_contact.png")

    # Navigate to the bpo page and take a screenshot
    page.goto("http://localhost:8080/lang_es/bpo.html")
    time.sleep(5)  # Wait for the page to load
    page.screenshot(path="screenshot_bpo.png")

    browser.close()

with sync_playwright() as playwright:
    take_screenshots(playwright)
