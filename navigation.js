function navigateTo(page) {
    switch(page) {
        case 'Dashboard':
            window.location.href = 'Dashboard.html';
            break;
        case 'stock':
            window.location.href = 'Stock.html';
            break;
        case 'dailySummary':
            window.location.href = 'DailySummary.html';
            break;

        case 'creditBill':
            window.location.href = 'CreditBill.html';
            break;
        case 'cashBill':
            window.location.href = 'CashBill.html';
            break;
        case 'discountShops':
            window.location.href = 'DiscountShops.html';
            break;
        case 'cheques':
            window.location.href = 'Cheques.html';
            break;
        case 'damagedItems':
            window.location.href = 'DamagedItems.html';
            break;
        default:
            console.log('Invalid navigation target');
    }
}

// Function to set date field to today's date
function setTodayDate() {
    const dateField = document.getElementById('date');
    if (dateField) {
        const today = new Date().toISOString().split('T')[0];
        dateField.value = today;
    }
}

// Initialize the page when DOM content is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Check if we're on the Credit Bill page by looking for the date field
    if (document.getElementById('date')) {
        setTodayDate();
    }
});