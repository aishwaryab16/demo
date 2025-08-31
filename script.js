function sayHello() {
  // Slightly fancy alert with emoji fallback
  const sparkle = "✨";
  alert(`Hello from Cursor ${sparkle}`);
}

// Progressive enhancement: focus ring on keyboard nav
(function enableFocusVisiblePolyfill(){
  let hadKeyboardEvent = false;

  function handleFirstTab(e) {
    if (e.key === 'Tab') {
      document.body.classList.add('user-is-tabbing');
      window.removeEventListener('keydown', handleFirstTab);
    }
  }

  window.addEventListener('keydown', handleFirstTab, false);
})();