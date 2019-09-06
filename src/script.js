class Order {
    constructor() {
        this.btnNext = document.querySelectorAll('.js-next-step');
        this.tabsContent = document.getElementsByClassName('js-tab');
        this.tabs = document.getElementsByClassName('order-nav__item');
        this.activeClass = 'order-nav__item_active';
        this.fieldErrorClass = 'user-field__input_error';
        this.yurSelect = document.querySelector('.js-yur-select');
        this.yurList = document.querySelector('.js-toggle-yur-fields');
        this.openModalBtn = document.querySelector('.js-open-modal');
        this.closeModalBtn = document.querySelector('.js-modal-close');
        this.modalWrap = document.querySelector('.js-modal');
        this.phoneField = document.querySelector('.js-phone-field');
        this.fields = document.querySelectorAll('.js-order-field');
        this.deliveryAddressLabel = document.querySelector('.js-delivery-address');
        this.deliveryAddress = document.querySelector('.js-address-field');
        this.events();
    }
    events() {
        this.btnNext.forEach((elem) => {
            elem.addEventListener('click', this.slide.bind(this));
        });

        this.fields.forEach((field) => {
            field.addEventListener('focus', this.removeErrorClass.bind(this));
        });

        this.yurSelect.addEventListener('change', this.toggleYur.bind(this,event));

        this.openModalBtn.addEventListener('click', this.modalOpen.bind(this));

        this.closeModalBtn.addEventListener('click', this.modalClose.bind(this));

        window.addEventListener('click', this.outsideClick.bind(this));
    }
    toggleYur() {
        console.log(event.target.value);
        if (event.target.value==='yur') {
            this.yurList.classList.remove('yur-field_hidden');
            console.log('true');
        }
        else {
            this.yurList.classList.add('yur-field_hidden');
        }

    }
    slide(e) {
        // Если телефон не введён, добавляем инпуту класс ошибки и выходим
        if (!this.phoneField.value) {
            this.phoneField.classList.add(this.fieldErrorClass);
            return false;
        }

        // Если адрес активен и не введён, добавляем текстарии класс ошибки и выходим
        if (!this.deliveryAddressLabel.classList.contains('user-field_hidden')) {
            if (!this.deliveryAddress.value) {
                this.deliveryAddress.classList.add('user-field__input_error');
                return false;
            }
        }

        let step = e.target.dataset.step;
        let leftIndent = '-100%';
        if (step=='delivery') {
            leftIndent = '-200%';
        }
        [].forEach.call(this.tabsContent, function (tabContent) {
            tabContent.style.left = leftIndent;
        });

        this.changeTab();

        e.preventDefault();
        return false;
    }
    changeTab(e) {
        let arr = [...this.tabs];
        let activeClass = this.activeClass;
        let activeTab = false;

        // console.log(arr);
        arr.reduce(function (previousValue, currentItem) {
            // console.log(previousValue);
            if (previousValue) {
                currentItem.classList.add(activeClass);
                activeTab = false;
            }
            else if (currentItem.classList.contains(activeClass)) {
                activeTab = true;
                currentItem.classList.remove(activeClass);
            }
            else {
                activeTab = false;
            }
            return activeTab;
        },0)
    }
    modalOpen() {
        event.preventDefault();
        this.modalWrap.classList.remove('agr-modal__hidden');
    }
    modalClose() {
        this.modalWrap.classList.add('agr-modal__hidden');
    }
    outsideClick() {
        if(event.target === this.modalWrap) {
            this.modalClose();
        }
    }
    removeErrorClass(field) {
        field.target.classList.remove(this.fieldErrorClass);
    }

}
setTimeout(
    function () {
        let order = new Order();
    },
    100
);


