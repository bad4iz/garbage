/**
 * Created by bad4i on 20.07.2017.
 */
// dragstart - вызывается в самом начале переноса перетаскиваемого элемента.
// dragend - вызывается в конце события перетаскивания - как успешного, так и отмененного.
// dragenter - происходит в момент когда перетаскиваемый объект попадает в область целевого элемента.
// dragleave - происходит когда перетаскиваемый элемент покидает область целевого элемента.
// dragover - происходит когда перетаскиваемый элемент находиться над целевым элементом.
// drop - вызывается, когда событие перетаскивания завершается отпусканием элемента над целевым элементом.

window.onload = function () {

    var sources = document.querySelectorAll(".children");

    sources.forEach(source => {
    // начало операции drag
    source.addEventListener('dragstart', function (evt) {
        this.style.border = "3px dotted #000"; // меняем стиль в начале операции drag & drop

        // Свойство effectAllowed управляет визуальным эффектом (чаще всего это вид указателя мыши), который браузер создает в ответ
        // на тип происходящего  события перетаскивания (перемещение, копирование и т. п.).
        // http://msdn.microsoft.com/en-us/library/ie/ms533743%28v=vs.85%29.aspx
        evt.dataTransfer.effectAllowed = "move";

        // Метод setData(...) сообщает механизму перетаскивания в браузере, какие данные из перетаскиваемого объекта должен «поймать»
        // целевой элемент, также называемый зоной приема. Здесь мы указываем, что передаваемые данные это id элемента
        evt.dataTransfer.setData("Text", this.id);

    }, false);

    // конец операции drag
    source.addEventListener("dragend", function (evt) {
        this.style.border = ""; // удаляем стили добавленные в начале операции drag & drop
        console.log(this.id);
    }, false);

    });
    var target = document.getElementById("parent");

    // перетаскиваемый объект попадает в область целевого элемента
    target.addEventListener("dragenter", function (evt) {
        this.style.border = "3px solid red";
    }, false);

    // перетаскиваемый элемент покидает область целевого элемента
    target.addEventListener("dragleave", function (evt) {
        this.style.border = "";
    }, false);

    target.addEventListener("dragover", function (evt) {
        // отменяем стандартное обработчик события dragover.
        // реализация данного обработчика по умолчанию не позволяет перетаскивать данные на целевой элемент, так как большая
        // часть веб страницы не может принимать данные.
        // Для того что бы элемент мог принять перетаскиваемые данные необходимо отменить стандартный обработчик.
        if (evt.preventDefault) evt.preventDefault();
        return false;
    }, false);

    // перетаскиваемый элемент отпущен над целевым элементом
    target.addEventListener("drop", function (evt) {

        // прекращаем дальнейшее распространение события по дереву DOM и отменяем возможный стандартный обработчик установленный браузером.
        if (evt.preventDefault) evt.preventDefault();
        if (evt.stopPropagation) evt.stopPropagation();

        this.style.border = "";
        var id = evt.dataTransfer.getData("Text"); // получаем информации которая передавалась через операцию drag & drop

        var elem = document.getElementById(id);
        // добавляем элемент в целевой элемент. Так как в DOM не может быть два идентичных элемента - элемент удаляется со своей старой позиции.
        this.appendChild(elem);

        return false;
    }, false);
}