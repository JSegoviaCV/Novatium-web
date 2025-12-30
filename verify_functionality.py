from playwright.sync_api import sync_playwright

def run_verification(playwright):
    browser = playwright.chromium.launch()
    context = browser.new_context(viewport={'width': 1920, 'height': 1080})
    page = context.new_page()

    # Navigate to the main index page, which is the Spanish version
    page.goto("http://localhost:8080/")

    # Wait for the page to be fully loaded, especially the footer
    page.wait_for_selector("footer.footer")

    # Use a specific locator to target the 'Servicios' button within the main navbar
    navbar = page.locator('nav.navbar')
    servicios_button = navbar.get_by_role('button', name='Servicios')

    # Click the button
    servicios_button.click()

    # Wait for the correct dropdown container to become visible
    dropdown_menu_selector = "#collapseLeft1.show"
    page.wait_for_selector(dropdown_menu_selector)

    # Add a short delay to allow for animations to complete
    page.wait_for_timeout(1000)

    # Take a screenshot of the page with the dropdown open
    page.screenshot(path="screenshot_servicios_dropdown.png")

    browser.close()

with sync_playwright() as playwright:
    run_verification(playwright)
