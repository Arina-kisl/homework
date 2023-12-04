function findKthDigit(k) {
    let sequence = '';
    
    // Генерация последовательности
    for (let i = 1; i <= 300; i++) {
        sequence += i;
    }

    // Получение k-й цифры
    const kthDigit = sequence[k - 1];
    
    return kthDigit;
}