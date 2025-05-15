// Загальний JavaScript файл для проекту
console.log('TestAllsaved application loaded');

// Ініціалізація Bootstrap компонентів
document.addEventListener('DOMContentLoaded', function() {
    // Ініціалізація тултипів
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
});
