document.addEventListener('DOMContentLoaded', function() {
    const issuedDateInput = document.getElementById('issued_date');
    const expiryDateInput = document.getElementById('expiry_date');

    const calculateExpiryDate = () => {
        if (issuedDateInput.value) {
            // Extraer año, mes y día
            const [year, month, day] = issuedDateInput.value.split('-').map(Number);

            // Crear la fecha de expedición usando el constructor local (sin desfase de UTC)
            const issuedDate = new Date(year, month - 1, day);
            // Clonar la fecha y sumar 10 años
            const expiryDate = new Date(issuedDate);
            expiryDate.setFullYear(expiryDate.getFullYear() + 10);

            // Formatear a YYYY-MM-DD
            const expiryYear = expiryDate.getFullYear();
            const expiryMonth = String(expiryDate.getMonth() + 1).padStart(2, '0');
            const expiryDay = String(expiryDate.getDate()).padStart(2, '0');
            expiryDateInput.value = `${expiryYear}-${expiryMonth}-${expiryDay}`;
        }
    };

    // Calcular al cargar si ya hay valor
    if (issuedDateInput.value) {
        calculateExpiryDate();
    }

    // Calcular cuando cambia la fecha de expedición
    issuedDateInput.addEventListener('change', calculateExpiryDate);
});
