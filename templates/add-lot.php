<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $category) : ?>
        <li class="nav__item">
            <a href="all-lots.html"><?= htmlspecialchars($category['name']); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>
<?php $classInvalidForm = !empty($errors) ? "form--invalid" : ""; ?>
<form class="form form--add-lot container <?= $classInvalidForm; ?>" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php $classInvalidField = !empty($errors['nameItem']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="nameItem" type="text" name="nameItem" placeholder="Введите наименование лота">
            <span class="form__error">Введите наименование лота</span>
        </div>
        <?php $classInvalidField = !empty($errors['categoryId']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="category">Категория <sup>*</sup></label>
            <select id="category" name="categoryId">
            <?php foreach ($categories as $category) : ?>
                <option value ="<?= $category['id']; ?>"
                <?php if ($category['id'] === isAddedValue('categoryId')) : ?>
                    selected
                <?php endif; ?>>
                    <?= $category['name']; ?>
                </option>
            </select>
            <span class="form__error">Выберите категорию</span>
        </div>
    </div>
    <?php $classInvalidField = !empty($errors['description']) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--wide <?= $classInvalidField; ?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="description" name="description" placeholder="Напишите описание лота"></textarea>
        <span class="form__error">Напишите описание лота</span>
    </div>
    <?php $classInvalidField = !empty($errors['image']) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--file <?= $classInvalidField; ?>">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="image" name="image" value="">
            <label for="lot-img">
            Добавить
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <?php $classInvalidField = !empty($errors['firstPrice']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small <?= $classInvalidField; ?>">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="firstPrice" type="text" name="firstPrice" placeholder="0">
            <span class="form__error">Введите начальную цену</span>
        </div>
        <?php $classInvalidField = !empty($errors['stepBet']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="stepBet" type="text" name="stepBet" placeholder="0">
            <span class="form__error">Введите шаг ставки</span>
        </div>
        <?php $classInvalidField = !empty($errors['expiryDate']) ? "form__item--invalid" : ""; ?>
        <div class="form__item">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="expiryDate" type="text" name="expiryDate" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <span class="form__error">Введите дату завершения торгов</span>
        </div>
    </div>
    <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <button type="submit" class="button">Добавить лот</button>
</form>
