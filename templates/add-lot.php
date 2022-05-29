<nav class="nav">
    <ul class="nav__list container">
        <?php foreach ($categories as $category) : ?>
        <li class="nav__item">
            <a href="all-lots.html"><?= htmlspecialchars($category['name']); ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</nav>

<form class="form form--add-lot container" action="add.php" method="post" enctype="multipart/form-data">
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <?php $classInvalidField = !empty($errors['nameItem']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="lot-name">Наименование <sup>*</sup></label>
            <input id="nameItem" type="text" name="nameItem" placeholder="Введите наименование лота">
            <?php if (!empty($errors['nameItem'])) : ?>
            <span class="form__error"><?= $errors['nameItem']; ?></span>
            <?php endif; ?>
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
            <?php if (!empty($errors['categoryId'])) : ?>
            <span class="form__error"><?= $errors['categoryId']; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php $classInvalidField = !empty($errors['description']) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--wide <?= $classInvalidField; ?>">
        <label for="message">Описание <sup>*</sup></label>
        <textarea id="description" name="description" placeholder="Напишите описание лота"></textarea>
        <?php if (!empty($errors['description'])) : ?>
        <span class="form__error"><?= $errors['description']; ?></span>
        <?php endif; ?>
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
        <?php if (!empty($errors['image'])) : ?>
        <span class="form__error"><?= $errors['image']; ?></span>
        <?php endif; ?>
    </div>
    <div class="form__container-three">
        <?php $classInvalidField = !empty($errors['firstPrice']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small <?= $classInvalidField; ?>">
            <label for="lot-rate">Начальная цена <sup>*</sup></label>
            <input id="firstPrice" type="text" name="firstPrice" placeholder="0">
            <?php if (!empty($errors['firstPrice'])) : ?>
            <span class="form__error"><?= $errors['firstPrice']; ?></span>
            <?php endif; ?>
        </div>
        <?php $classInvalidField = !empty($errors['stepBet']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small">
            <label for="lot-step">Шаг ставки <sup>*</sup></label>
            <input id="stepBet" type="text" name="stepBet" placeholder="0">
            <?php if (!empty($errors['stepBet'])) : ?>
            <span class="form__error"><?= $errors['stepBet']; ?></span>
            <?php endif; ?>
        </div>
        <?php $classInvalidField = !empty($errors['expiryDate']) ? "form__item--invalid" : ""; ?>
        <div class="form__item">
            <label for="lot-date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="expiryDate" type="text" name="expiryDate" placeholder="Введите дату в формате ГГГГ-ММ-ДД">
            <?php if (!empty($errors['expiryDate'])) : ?>
            <span class="form__error"><?= $errors['expiryDate']; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($errors)) : ?>
    <?php $classInvalidForm = !empty($errors) ? "form--invalid" : ""; ?>
    <span class="form__error form__error--bottom <?= $classInvalidForm; ?>">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
</form>
