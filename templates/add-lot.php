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
        <?php $classInvalidField = !empty($errors['name']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="name">Наименование <sup>*</sup></label>
            <input id="name" type="text" name="name" placeholder="Введите наименование лота" value="<?= isAddedValue('name'); ?>">
            <?php if (!empty($errors['name'])) : ?>
            <span class="form__error"><?= $errors['name']; ?></span>
            <?php endif; ?>
        </div>
        <?php $classInvalidField = !empty($errors['category_id']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="category_id">Категория <sup>*</sup></label>
            <select id="category_id" name="category_id">
            <?php foreach ($categories as $category) : ?>
                <option value ="<?= $category['id']; ?>"
                <?php if ($category['id'] === isAddedValue('category_id')) : ?>
                    selected
                <?php endif; ?>>
                    <?= $category['name']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <?php if (!empty($errors['category_id'])) : ?>
            <span class="form__error"><?= $errors['category_id']; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php $classInvalidField = !empty($errors['description']) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--wide <?= $classInvalidField; ?>">
        <label for="description">Описание <sup>*</sup></label>
        <textarea id="description" name="description" placeholder="Напишите описание лота"><?= isAddedValue('description'); ?></textarea>
        <?php if (!empty($errors['description'])) : ?>
        <span class="form__error"><?= $errors['description']; ?></span>
        <?php endif; ?>
    </div>
    <?php $classInvalidField = !empty($errors['image']) ? "form__item--invalid" : ""; ?>
    <div class="form__item form__item--file <?= $classInvalidField; ?>">
        <label>Изображение <sup>*</sup></label>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="image" name="image" value="<?= isAddedValue('image'); ?>">
            <label for="image">
            Добавить
            </label>
        </div>
        <?php if (!empty($errors['image'])) : ?>
        <span class="form__error"><?= $errors['image']; ?></span>
        <?php endif; ?>
    </div>
    <div class="form__container-three">
        <?php $classInvalidField = !empty($errors['first_price']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small <?= $classInvalidField; ?>">
            <label for="first_price">Начальная цена <sup>*</sup></label>
            <input id="first_price" type="text" name="first_price" placeholder="0" value="<?= isAddedValue('first_price'); ?>">
            <?php if (!empty($errors['first_price'])) : ?>
            <span class="form__error"><?= $errors['first_price']; ?></span>
            <?php endif; ?>
        </div>
        <?php $classInvalidField = !empty($errors['step_bet']) ? "form__item--invalid" : ""; ?>
        <div class="form__item form__item--small <?= $classInvalidField; ?>">
            <label for="step_bet">Шаг ставки <sup>*</sup></label>
            <input id="step_bet" type="text" name="step_bet" placeholder="0" value="<?= isAddedValue('step_bet'); ?>">
            <?php if (!empty($errors['step_bet'])) : ?>
            <span class="form__error"><?= $errors['step_bet']; ?></span>
            <?php endif; ?>
        </div>
        <?php $classInvalidField = !empty($errors['expiry_date']) ? "form__item--invalid" : ""; ?>
        <div class="form__item <?= $classInvalidField; ?>">
            <label for="expiry_date">Дата окончания торгов <sup>*</sup></label>
            <input class="form__input-date" id="expiry_date" type="text" name="expiry_date" placeholder="Введите дату в формате ГГГГ-ММ-ДД" value="<?= isAddedValue('expiry_date'); ?>">
            <?php if (!empty($errors['expiry_date'])) : ?>
            <span class="form__error"><?= $errors['expiry_date']; ?></span>
            <?php endif; ?>
        </div>
    </div>
    <?php if (!empty($errors)) : ?>
    <?php $classInvalidForm = !empty($errors) ? "form--invalid" : ""; ?>
    <span class="form__error form__error--bottom <?= $classInvalidForm; ?>">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
</form>
