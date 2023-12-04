function findAndSum(array) {
    let sum = 0;
    let found = false;

    for (let i = 0; i < array.length; i++) {
        // Проверка условия: косинус положителен
        if (Math.cos(array[i]) > 0) {
            found = true;
        }

        // Если элемент удовлетворяет условию, начинаем считать сумму
        if (found) {
            sum += array[i];
        }
    }

    return sum;
}