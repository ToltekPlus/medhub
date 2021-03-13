function showNotification({top = 0, right = 0, className, html}) {
    let notification = document.createElement('div');
    notification.className = "notification";
    if (className) notification.classList.add(className);

    notification.style.top = top + 'px';
    notification.style.right = right + 'px';
    notification.style.position = 'absolute';
    notification.style.backgroundColor = '#34c992';
    notification.style.boxShadow = '0 11px 17px 0 rgba(23,32,61,.13)';
    notification.style.borderRadius = '2px';
    notification.style.padding = '8px';
    notification.style.fontSize = '0.6em';
    notification.style.textAlign = 'left';
    notification.style.color = 'white';
    notification.style.animationName = 'bounceIn';
    notification.style.animationDuration = '600ms';
    notification.style.animationIterationCount = '1';

    notification.innerHTML = html;
    document.body.append(notification);

    setTimeout(() => {notification.remove()}, 5500);
}


document.addEventListener('DOMContentLoaded', () => {
    // данные для работы с формой
    // здесь описаны роуты откуда будут идти методы добавления, удаления, обновления
    let typeOperation = [
        {
            'page': 'add',
            'action': 'store',
            'message': 'Данные добавлены'
        },
        {
            'page': 'edit',
            'action': 'update',
            'message': 'Данные обновлены'
        },
        {
            'page': 'warning',
            'action': 'delete',
            'message': 'Данные удалены'
        }
    ];

    // собираем урл адрес без get параметров
    let urlPath = window.location.origin + window.location.pathname;

    // ищем сообтветствующий метод для работы
    let operation = typeOperation.filter(item => {
        return item.page === urlPath.split('/').pop();
    });

    const ajaxSend = async (formData) => {
        const fetchResp = await fetch(operation[0].action, {
            method: 'POST',
            body: formData
        });
        if (!fetchResp.ok) {
            throw new Error(`Ошибка по адресу ${url}, статус ошибки ${fetchResp.status}`);
        }
        return await fetchResp.text();
    };

    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            ajaxSend(formData)
                .then((response) => {
                    showNotification({
                        top: 10,
                        right: 10,
                        html: operation[0].message,
                    });

                    console.log(response)

                    form.reset(); // очищаем поля формы
                })
                .catch((err) => console.error(err))
        });
    });
});