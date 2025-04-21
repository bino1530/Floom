    document.addEventListener('DOMContentLoaded', () => {
        const minusBtn = document.querySelector('.qty-btn.minus');
        const plusBtn = document.querySelector('.qty-btn.plus');
        const qtyInput = document.querySelector('.qty-input');

        minusBtn.addEventListener('click', () => {
            if (qtyInput.value > 1) qtyInput.value--;
        });

        plusBtn.addEventListener('click', () => {
            qtyInput.value++;
        });
    });