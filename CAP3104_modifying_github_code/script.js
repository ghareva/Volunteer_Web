// Get the checkbox element
const darkModeToggle = document.getElementById('darkModeToggle');

// Check if dark mode is already set in localStorage
if (localStorage.getItem('dark-mode') === 'enabled') {
    document.body.classList.add('dark-mode');
    darkModeToggle.checked = true;
}

// Toggle Dark Mode on switch change
darkModeToggle.addEventListener('change', () => {
    document.body.classList.toggle('dark-mode');
    
    // Save the state to localStorage
    if (document.body.classList.contains('dark-mode')) {
        localStorage.setItem('dark-mode', 'enabled');
    } else {
        localStorage.removeItem('dark-mode');
    }
});

