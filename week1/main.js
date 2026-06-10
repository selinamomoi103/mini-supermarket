// ==========================================
// WEEK 1: MINI-SUPERMARKET STANDALONE JS FILE
// ==========================================

// Wait for the browser to completely load the HTML page structure first
document.addEventListener("DOMContentLoaded", function() {
    
    // 1. Print a success message to the browser's developer console
    console.log("==================================================");
    console.log("🛒 QUICKMART SUPERMARKET LOG: JavaScript file is connected!");
    console.log("File Location: mini_supermarket/week1/assets/js/main.js");
    console.log("==================================================");

    // 2. Select the system snapshot container on the page to verify DOM access
    const environmentBox = document.querySelector('.details');
    
    if (environmentBox) {
        // Log that our script successfully targeted the HTML layout elements
        console.log("✓ System check: HTML container successfully targeted by JS.");
        
        // Add a subtle visual effect to prove the script works (slight border change)
        environmentBox.style.borderLeft = "4px solid #3498db";
    } else {
        console.log("⚠ System check: Could not find the environment details box.");
    }
});