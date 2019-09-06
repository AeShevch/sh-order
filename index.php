<link rel="stylesheet" href="<?php echo PATH_SITE_TEMPLATE ?>/modules/order/dist/style.css">
<script src="<?php echo PATH_SITE_TEMPLATE ?>/modules/order/dist/script.js"></script>

<!-- Форма оформления заказа -->
<main class="order">
    <!-- Основная часть формы -->
    <section class="order__section order-tabs">
        <header class="order-tabs__header">
            <!-- Кнопки навигации по разделам -->
            <nav class="order-nav">
                <ul class="order-nav__list">
                    <li class="order-nav__item order-nav__item order-nav__item_active">
                        <button class="tab-btn js-open-tab"
                                data-tab-class="js-tab-user">
                            <span class="tab-btn__counter">1</span>
                            <span class="tab-btn__title">Покупатель</span>
                        </button>
                    </li>
                    <li class="order-nav__item">
                        <button class="tab-btn js-open-tab"
                                data-tab-class="js-tab-delivery">
                            <span class="tab-btn__counter">2</span>
                            <span class="tab-btn__title">Доставка</span>
                        </button>
                    </li>
                    <li class="order-nav__item">
                        <button class="tab-btn js-open-tab"
                                data-tab-class="js-tab-pay">
                            <span class="tab-btn__counter">3</span>
                            <span class="tab-btn__title">Оплата</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </header>
        <!-- Форма заказа -->
        <form class="order-tabs__form order-form cart-form"
              action="<?php echo SITE ?>/order?creation=1"
              method="post">
            <!-- 1. Вкладка «Покупатель» -->
            <div class="tab-content tab-content_active js-tab" data-tab="1">
                <div class="tab-content__inner tab-user">
                    <div class="tab-user__form user-inputs">
                        <label class="user-inputs__item user-field">
                            <span class="user-field__title">Мобильный <br>телефон</span>
                            <input class="user-field__input js-order-field js-phone-field"
                                   type="tel"
                                   name="phone"
                                   placeholder="<?php echo lang('phone'); ?>"
                                   value="<?php echo $_POST['phone'] ?>">
                        </label>
                        <label class="user-inputs__item user-field">
                            <span class="user-field__title">ФИО <br>получателя</span>
                            <input class="user-field__input js-order-field js-name-field"
                                   type="text"
                                   name="fio"
                                   placeholder="<?php echo lang('fio'); ?>"
                                   value="<?php echo $_POST['fio'] ?>">
                        </label>
                        <label class="user-inputs__item user-field">
                            <span class="user-field__title">Электронная <br>почта</span>
                            <input class="user-field__input js-order-field js-email-field"
                                   type="email"
                                   name="email"
                                   placeholder="Email"
                                   value="<?php echo $_POST['email'] ?>">
                        </label>
                        <!--     Скрытый инпут для текста гравировки     -->
                        <input type="hidden" name="info" class="js-insert-grav-text">

                        <label class="user-inputs__item user-field">
                            <span class="user-field__title"></span>
                            <select name="customer" class="user-field__input js-order-field user-field__input js-order-field_select js-yur-select">
                                <?php $selected = $_POST['customer'] == "yur" ? 'selected' : ''; ?>
                                <option value="fiz"><?php echo lang('orderFiz');?></option>
                                <option value="yur" <?php echo $selected ?>><?php echo lang('orderYur');?></option>
                            </select>
                        </label>

                        <?php if ($_POST['customer'] != "yur") {
                            $toggleClass = 'yur-field_hidden';
                        } ?>
                        <div class="form-list yur-field js-toggle-yur-fields <?php echo $toggleClass ?>">

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhNameyur');?></span>
                                <input class="user-field__input js-order-field js-nameyur-field"
                                       type="text"
                                       name="yur_info[nameyur]"
                                       value="<?php echo $_POST['yur_info']['nameyur'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhAdress');?></span>
                                <input class="user-field__input js-order-field js-adress-field"
                                       type="text"
                                       name="yur_info[adress]"
                                       value="<?php echo $_POST['yur_info']['adress'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhInn');?></span>
                                <input class="user-field__input js-order-field js-inn-field"
                                       type="text"
                                       name="yur_info[inn]"
                                       value="<?php echo $_POST['yur_info']['inn'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhKpp');?></span>
                                <input class="user-field__input js-order-field js-kpp-field"
                                       type="text"
                                       name="yur_info[kpp]"
                                       value="<?php echo $_POST['yur_info']['kpp'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhBank');?></span>
                                <input class="user-field__input js-order-field js-bank-field"
                                       type="text"
                                       name="yur_info[bank]"
                                       value="<?php echo $_POST['yur_info']['bank'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhBik');?></span>
                                <input class="user-field__input js-order-field js-bik-field"
                                       type="text"
                                       name="yur_info[bik]"
                                       value="<?php echo $_POST['yur_info']['bik'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhKs');?></span>
                                <input class="user-field__input js-order-field js-ks-field"
                                       type="text"
                                       name="yur_info[ks]"
                                       value="<?php echo $_POST['yur_info']['ks'] ?>">
                            </label>

                            <label class="user-inputs__item user-field">
                                <span class="user-field__title"><?php echo lang('orderPhRs');?></span>
                                <input class="user-field__input js-order-field js-rs-field"
                                       type="text"
                                       name="yur_info[rs]"
                                       value="<?php echo $_POST['yur_info']['rs'] ?>">
                            </label>

                        </div>
                    </div>
                    <!-- Кнопка перехода на следующий таб-->
                    <button data-step="contacts"
                            title="Перейти в следующий раздел"
                            id="js-next-step"
                            class="order-form__btn js-next-step">Дальше</button>

                    <!-- Соглашение об обработки персональных данных -->
                    <div class="order-form__agreement personal-agr">
                          <span class="personal-agr__text-content">
                              Нажимая на кнопку вы подтверждаете, что прочитали <br> и соглашаетесь с
                              <button class="personal-agr__link js-open-modal">
                                  политикой обработки персональных данных
                              </button>
                          </span>
                    </div>
                </div>
            </div>
            <!-- 2. Вкладка «Доставка» -->
            <div class="tab-content js-tab" data-tab="2">
                <div class="order-radio">
                    <?php
                    // TODO Сделать нормально - брать id шники из базы или найти функцию, которая их найдёт
                    // getPaymentBlocksMethod() - походу это штука просто получаем массив способо доставки
                    $deliv = new Delivery();
                    for ($i = 10; $i >= 0; $i--) {
                        $deliveryArr = $deliv->getDeliveryById($i);
                        //                            viewData($deliveryArr);
                        if (($deliveryArr) && ($deliveryArr['activity']=='1')) {
                            ?>
                            <div class="order-radio__item">
                                <input data-delivery-price="<?php echo $deliveryArr['cost'] ?>"
                                       data-delivery-id="<?php echo $deliveryArr['id'] ?>"
                                       data-delivery-date="<?php echo $deliveryArr['date'] ?>"
                                       data-delivery-interval="<?php echo ($deliveryArr['interval'])?str_replace('"', '\'', $deliveryArr['interval']):''; ?>"
                                       value="<?php echo $deliveryArr['id'] ?>"
                                       class="order-radio__input js-delivery-input"
                                       type="radio" id="delivery-<?php echo $deliveryArr['id'] ?>"
                                       name="delivery" <?php echo ($deliveryArr['id']=='6')?'checked':''; ?>>
                                <label class="order-radio__label"
                                       for="delivery-<?php echo $deliveryArr['id'] ?>">
                                    <?php echo $deliveryArr['name'] ?>
                                </label>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <label class="user-inputs__item user-field delivery-date">
                      <span class="user-field__title">
                        <?php echo lang('orderDeliveryDate'); ?>:
                      </span>
                    <input class="user-field__input js-order-field js-date-delivery"
                           placeholder="<?php echo lang('orderDeliveryDate'); ?>"
                           autocomplete="off"
                           type="text"
                           name="date_delivery"
                           value="<?php echo $_POST['date_delivery'] ?>">
                </label>

                <label class="user-inputs__item user-field delivery-interval user-field_hidden">
                    <span class="user-field__title"><?php echo lang('orderDeliveryInterval'); ?>:</span>
                    <select name="delivery_interval" class="js-interval-select"></select>
                </label>

                <label class="order-radio__field user-inputs__item user-field user-field_hidden user-field_textarea js-delivery-address">
                    <span class="user-field__title"><?php echo lang('orderPhAdres'); ?>:</span>
                    <textarea class="user-field__input js-order-field js-address-field"
                              type="text"
                              name="address"><?php echo $_POST['address'] ?></textarea>
                </label>

                <div class="js-pvz-address order-radio__pvz-address pvz-field">
                      <span class="pvz-field__text-content">
                          <b>Адрес пункта самовывоза:</b><br>
                          г.Москва, м. Тушинская, ул Тушинская 24
                      </span>
                    <script charset="utf-8" async
                            src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A4f2a957a80932587656e23252ab36a184f3732c1f76b0c4922118123c33549ae&amp;width=100%25&amp;height=250&amp;lang=ru_RU&amp;scroll=true"></script>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.js-delivery-input').on('change', function() {
                            var currDelPrice = + $(this).data('delivery-price'),
                                prodsPrice = + $('.js-prods-price').text().replace(/[^0-9]/gim, ""),
                                totalSum = currDelPrice + prodsPrice,
                                delivId = $(this).data('delivery-id'),
                                delivDate = $(this).data('delivery-date'),
                                delivDateField = document.querySelector('.js-date-delivery'),
                                delivInterval = $(this).data('delivery-interval'),
                                delivIntervalSelect = document.querySelector('.js-interval-select'),
                                classHidden = 'user-field_hidden';

                            if (delivInterval) {
                                delivIntervalSelect.innerHTML='';
                                var intervalObj = eval(delivInterval);
                                intervalObj.forEach(function(interval) {
                                    delivIntervalSelect.options[delivIntervalSelect.options.length] = new Option(interval, interval);
                                });
                                delivIntervalSelect.parentNode.classList.remove(classHidden);
                            }
                            else {
                                delivIntervalSelect.parentNode.classList.add(classHidden);
                            }

                            if (delivDate) {
                                delivDateField.parentNode.classList.remove(classHidden);
                            }
                            else {
                                delivDateField.parentNode.classList.add(classHidden);
                            }

                            $('.js-deliv-price-insert').text(currDelPrice);
                            $('.js-total-summ').text(totalSum + ' руб.');

                            if (delivId === 6) {

                                $('.js-delivery-address').addClass(classHidden);
                                $('.js-pvz-address').removeClass(classHidden);
                            }
                            else {
                                $('.js-delivery-address').removeClass(classHidden);
                                $('.js-pvz-address').addClass(classHidden);
                            }

                        });
                    });
                </script>

                <!-- Кнопка перехода на следующий таб-->
                <button data-step="delivery"
                        title="Перейти в следующий раздел"
                        id="js-next-step"
                        class="order-form__btn js-next-step">Дальше</button>
            </div>
            <!-- 3. Вкладка «Оплата» -->
            <div class="tab-content tab-content_payment js-tab" data-tab="3">
                <div class="order-radio payment-details-list">
                    <?php
                    $order = new Models_Order();
                    $payments = $order->getPaymentBlocksMethod();
                    $counter = 0;
                    foreach ($payments as $payment) {
                        if ($payment['activity']) {
                            $counter++;
                            $deliveryMethod = json_decode($payment['deliveryMethod']);
                            $deliveriesForPayment = '';
                            foreach ($deliveryMethod as $deliveryId => $activity) {
                                if($activity) {
                                    $deliveriesForPayment.= $deliveryId.',';
                                }
                            }
                            $deliveriesForPayment = chop($deliveriesForPayment, ' ,');
                            ?>
                            <div class="order-radio__item">
                                <input class="order-radio__input js-radio-payment"
                                       data-deliveries="<?php echo $deliveriesForPayment ?>"
                                       type="radio"
                                       id="payment-<?php echo $payment['id'] ?>"
                                       value="<?php echo $payment['id'] ?>"
                                    <?php echo ($counter===1)?'checked':''; ?>
                                       name="payment">
                                <label class="order-radio__label"
                                       for="payment-<?php echo $payment['id'] ?>">
                                    <?php echo $payment['name'] ?>
                                </label>
                            </div>

                            <?php
                        }
                    }
                    ?>
                </div>
                <input type="submit" name="toOrder"
                       role="button"
                       class="order-form__submit js-create-order order-form__btn"
                       value="<?php echo lang('checkout');?>">

            </div>
        </form>

    </section>
    <aside class="order__aside">
        <article class="order-cart">
            <h2 class="order-cart__title">Мой заказ</h2>
            <div class="order-cart__inner">
                <div class="order-cart__list cart-list">
                    <table class="cart-list__ul">
                        <?php

                        $productsList = [];

                        foreach ($cartArr['dataCart'] as $key=>$cartProduct) {
                            // Создаём массив товаров для аякса, за одно выводим список товаров в корзине
                            $productsList[$key]['id'] = $cartProduct['id'];
                            $productsList[$key]['name'] = $cartProduct['title'];
                            $productsList[$key]['url'] = $cartProduct['category_url'].$cartProduct['product_url'];
                            $productsList[$key]['code'] = $cartProduct['code'];
                            $productsList[$key]['price'] = $cartProduct['price'];
                            $productsList[$key]['count'] = $cartProduct['countInCart'];
                            $productsList[$key]['discount'] = '0';
                            $productsList[$key]['fulPrice'] = $cartProduct['price_course'];
                            $productsList[$key]['weight'] = $cartProduct['weight'];
                            $productsList[$key]['unit'] = $cartProduct['unit'];
                            $productsList[$key]['currency_iso'] = $cartProduct['currency_iso'];
                            $productsList[$key]['1c_id'] = $cartProduct['1c_id'];
                            ?>
                            <tr class="cart-list__item cart-item">
                                <td class="cart-item__name">
                                    <?php echo $cartProduct['title']; ?>
                                </td>
                                <td class="cart-item__count"><?php echo $cartProduct['countInCart'].' '.(($cartProduct['unit'])?$cartProduct['unit']:'шт.') ?></td>
                                <!-- TODO Вставить валюту и возможные скидки -->
                                <td class="cart-item__price">
                                    <?php echo $cartProduct['price']; ?> руб.
                                </td>
                            </tr>

                        <?php }
                        // Сериализуем массив
                        $serialOrderList =  addslashes(serialize($productsList));
                        ?>
                    </table>
                </div>
                <div class="order-cart__list order-cart__list_result cart-list">
                    <ul class="cart-list__ul">
                        <li class="cart-list__item cart-item">
                            <span class="cart-item__name">Сумма</span>
                            <span class="cart-item__price js-prods-price"><?php echo $cartArr['cart_price_wc'] ?></span>
                        </li>
                        <li class="cart-list__item cart-item">
                            <span class="cart-item__name">Доставка</span>
                            <span class="cart-item__price">
	                              	<span class="js-deliv-price-insert">0</span>
	                              	 руб.
                              </span>
                        </li>
                        <li class="cart-list__item cart-item">
                            <strong class="cart-item__name">Итого</strong>
                            <strong class="cart-product__price js-total-summ">
                                <?php echo $cartArr['cart_price_wc'] ?>
                            </strong>
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </aside>
    <div class="order__modal agr-modal__wrap js-modal agr-modal__hidden" role="dialog" tabindex="-1">
        <div class="agr-modal" role="document">
            <button class="agr-modal__close js-modal-close">&times;</button>
            <article class="agr-modal__content">
                <?php echo  MG::layoutManager('layout_agreement', $data); ?>
            </article>
        </div>
    </div>
</main>
<script>

    $(document).ready(function() {

        $('.js-next-step').on('click', function(e) {
            var step = $(this).data('step'),
                call;

            if (step == 'contacts') {
                var customersPhone = $('.js-phone-field').val(),
                    customersNameInput = $('.js-name-field'),
                    customersName = customersNameInput.val(),
                    customersEmailInput = $('.js-name-field'),
                    customersEmail = customersEmailInput.val(),
                    yurFields = $('.js-toggle-yur-fields').find('input').serialize(),
                    comment = $('.js-insert-grav-text').val();


                if (!customersPhone) {
                    return false;
                }

                var orderList = '<?php echo $serialOrderList; ?>';
                var summ = '<?php echo $cartArr['cart_price'] ?>';

                call = $.ajax({
                    type: "POST",
                    url: "ajax",
                    data: {
                        action: "createOrder",
                        actionerClass: "Ajaxuser",
                        fio: (customersName)?customersName:'Не указано',
                        phone: (customersPhone)?customersPhone:'89000000000',
                        email: (customersEmail)?customersEmail:'no@email.ru',
                        orderList: orderList,
                        summ: summ,
                        comment: comment,
                        yurFields: yurFields,
                    },
                    success: function(data) {
                        window.orderId = data;
                    }
                });
            }

            else if (step == 'delivery') {
                var deliverySelected = $('.js-delivery-input:checked'),
                    deliveryId = deliverySelected.data('delivery-id'),
                    deliveryPrice = deliverySelected.data('delivery-price'),
                    deliveryAddressLabel = document.querySelector('.js-delivery-address'),
                    deliveryAddress = document.querySelector('.js-address-field'),
                    deliveryAddressVal = deliveryAddress.value,
                    deliveryDate = document.querySelector('.js-date-delivery').value,
                    deliveryTime = document.querySelector('.js-interval-select').value;

                if (!deliveryAddressLabel.classList.contains('user-field_hidden')) {
                    if (!deliveryAddressVal) {
                        deliveryAddress.classList.add('user-field__input_error');
                        return false;
                    }
                }

                $.ajax({
                    type: "POST",
                    url: "ajax",
                    data: {
                        action: "deliveryToOrder",
                        actionerClass: "Ajaxuser",
                        id: deliveryId,
                        price: deliveryPrice,
                        orderId: window.orderId,
                        address: (deliveryAddressVal)?deliveryAddressVal:'Не указан',
                        date: (deliveryDate)?deliveryDate:'',
                        time: (deliveryTime)?deliveryTime:''
                    }
                });

                // Показываем способы оплаты
                var paymentsArr = document.querySelectorAll('.js-radio-payment');
                paymentsArr.forEach(showPayments);

                function showPayments(payment) {
                    var deliveriesArr = payment.dataset.deliveries.split(','),
                        deliveryExists = deliveriesArr.some(x => +x === deliveryId);

                    if (deliveryExists) {
                        payment.parentElement.classList.remove('order-radio__item_hidden');
                    } else {
                        payment.parentElement.classList.add('order-radio__item_hidden');
                    }
                }

            }

        });
        $('.js-create-order').on('click', preOrder);
        // Перед отправкой заказа (Уже настоящего) удаляем временный заказ
        // и заполняем обязательные поля заглушками, если они не заполнены
        function preOrder() {

            var reqFields = [
                'phone',
                'name',
                'email',
            ];

            $.each(reqFields, pasteTest);

            function pasteTest(index, fieldClass) {
                var currentField = $('.js-' + fieldClass + '-field');
                if (currentField.val()=='') {
                    if (fieldClass==='phone') {
                        currentField.val('89000000000');
                    }
                    else {
                        currentField.val('no@email.ru');

                    }
                }

            }



            $.ajax({
                type: "POST",
                url: "ajax",
                data: {
                    action: "deleteOrder",
                    actionerClass: "Ajaxuser",
                    orderId: window.orderId
                }
            });
        }
    });

</script>