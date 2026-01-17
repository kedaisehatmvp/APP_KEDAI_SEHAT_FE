document.addEventListener('DOMContentLoaded', function () {
    window.scrollTo(0, 0);

    const orderData = {
        delivery_method: "{{ request('delivery_method') }}",
        delivery_time: "{{ request('delivery_time') }}",
        payment_method: "{{ request('payment_method') }}",
        timestamp: new Date().toISOString(),
        kelas: "XI RPL"
    };

    localStorage.setItem('lastOrder', JSON.stringify(orderData));
});