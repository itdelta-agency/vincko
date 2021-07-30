<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Оформление заказа");
?>


<main class="container main">
    <div class="installment">
        <div class="installment__left-column">
            <h2 class="installment__page-title">Оформление заказа</h2>

            <h3 class="installment__title">
                <span class="installment__title-lvl1">Готовое решение “Спокойствие”</span>
                <span class="installment__title-lvl2">Вариант Комфорт</span>
            </h3>
            (\/\/при оформления страховки добавляется блок внизу\/\/)
            <a href="#short-rd" class="to-short-rd">Подробнее</a>
            <div class="installment__calculator">
                <div class="section-result__price-bonuses-container">
                    <div class="installment__bonuses-title">Список компонентов заказа, к которому можно применить оплату
                        бонусами
                    </div>
                    <div class="section-result__price-title">
                        <div class="section-result__price-title-item">Наименование,<br>
                            стоимость
                        </div>
                        <div class="section-result__price-title-item">Будет оплачено <br>
                            бонусами
                        </div>
                        <div class="section-result__price-title-item">Остаток <br>
                            к оплате, руб
                        </div>
                        <div class="section-result__price-title-item">Курс <br>
                            руб/бонус
                        </div>

                    </div>

                    <div class="section-result__price-item">
                        <div class="section-result__price-item-name">
                            <div class="section-result__price-item-name-name">Датчик такой-то для того Датчик такой-то
                                для того
                            </div>
                            <div class="section-result__price-item-name-cost">1 200 руб / 1400 бонусов</div>
                        </div>
                        <div class="section-result__price-item-bonus-cost">1 199 бонусов</div>
                        <div class="section-result__price-item-rub-cost">1 руб</div>
                        <div class="section-result__price-item-rate">1 / 1,4</div>
                    </div>
                    <div class="section-result__price-item">
                        <div class="section-result__price-item-name">
                            <div class="section-result__price-item-name-name">Датчик такой-то для того Датчик такой-то
                                для того
                            </div>
                            <div class="section-result__price-item-name-cost">1 200 руб / 1400 бонусов</div>
                        </div>
                        <div class="section-result__price-item-bonus-cost">1 199 бонусов</div>
                        <div class="section-result__price-item-rub-cost">1 руб</div>
                        <div class="section-result__price-item-rate">1 / 1,4</div>
                    </div>


                </div>

                <div class="installment__calculator-left vis">
                    <div class="installment__calculator-first-pay">
                        <div class="installment__calculator-sub-head">
                            <span class="installment__calculator-sub-title">Первый взнос</span> <span
                                    class="installment__calculator-sub-value installment__calculator-sub-value-1">135 руб</span>
                        </div>
                        <div class="polzunok-container-2">
                            <div class="polzunok-1"><span tabindex="0"
                                                          class="ui-slider-handle ui-corner-all ui-state-default"><span
                                            class="polzunok__number polzunok__number-1">0</span> </span></div>
                        </div>
                        <div class="installment__calculator-footer">
                            50%
                        </div>
                    </div>

                    <div class="installment__calculator-time">
                        <div class="installment__calculator-sub-head">
                            <span class="installment__calculator-sub-title">Срок кредитования</span> <span
                                    class="installment__calculator-sub-value installment__calculator-sub-value-2">0</span>
                        </div>
                        <div class="polzunok-container-2">
                            <div class="polzunok-2"><span tabindex="0"
                                                          class="ui-slider-handle ui-corner-all ui-state-default"> </span>
                            </div>
                            <div class="installment__calculator-footer">
                                12 мес
                            </div>
                        </div>
                    </div>

                    <div class="installment__calculator-info">
                        <h4>Ежемесячный платеж</h4>
                        <div class="installment__calculator-info-month">1 456 руб</div>

                    </div>


                </div>

                <div class="installment__calculator-right">
                    <div class="section-result__right">

                        <div class="price__bonuses">
                            <h3>Сколько оплатить бонусами?

                            </h3>
                            <div class="price__bonuses-cost">
                                <div class="blue">3 000</div>
                                <div class="price__bonuses-info vis">
                                    <div>
                                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <rect width="30" height="30" rx="4" fill="#93B6FF"/>
                                            <path d="M15 9C13.8133 9 12.6533 9.35189 11.6666 10.0112C10.6799 10.6705 9.91085 11.6075 9.45673 12.7039C9.0026 13.8003 8.88378 15.0067 9.11529 16.1705C9.3468 17.3344 9.91825 18.4035 10.7574 19.2426C11.5965 20.0818 12.6656 20.6532 13.8295 20.8847C14.9933 21.1162 16.1997 20.9974 17.2961 20.5433C18.3925 20.0891 19.3295 19.3201 19.9888 18.3334C20.6481 17.3467 21 16.1867 21 15C21 14.2121 20.8448 13.4319 20.5433 12.7039C20.2417 11.9759 19.7998 11.3145 19.2426 10.7574C18.6855 10.2002 18.0241 9.75825 17.2961 9.45672C16.5681 9.15519 15.7879 9 15 9ZM15 18.6C14.8813 18.6 14.7653 18.5648 14.6667 18.4989C14.568 18.433 14.4911 18.3392 14.4457 18.2296C14.4003 18.12 14.3884 17.9993 14.4115 17.8829C14.4347 17.7666 14.4918 17.6596 14.5757 17.5757C14.6596 17.4918 14.7666 17.4347 14.8829 17.4115C14.9993 17.3884 15.12 17.4003 15.2296 17.4457C15.3392 17.4911 15.433 17.568 15.4989 17.6667C15.5648 17.7653 15.6 17.8813 15.6 18C15.6 18.1591 15.5368 18.3117 15.4243 18.4243C15.3117 18.5368 15.1591 18.6 15 18.6ZM15.6 15.504V16.2C15.6 16.3591 15.5368 16.5117 15.4243 16.6243C15.3117 16.7368 15.1591 16.8 15 16.8C14.8409 16.8 14.6883 16.7368 14.5757 16.6243C14.4632 16.5117 14.4 16.3591 14.4 16.2V15C14.4 14.8409 14.4632 14.6883 14.5757 14.5757C14.6883 14.4632 14.8409 14.4 15 14.4C15.178 14.4 15.352 14.3472 15.5 14.2483C15.648 14.1494 15.7634 14.0089 15.8315 13.8444C15.8996 13.68 15.9174 13.499 15.8827 13.3244C15.848 13.1498 15.7623 12.9895 15.6364 12.8636C15.5105 12.7377 15.3502 12.652 15.1756 12.6173C15.001 12.5826 14.82 12.6004 14.6556 12.6685C14.4911 12.7366 14.3506 12.852 14.2517 13C14.1528 13.148 14.1 13.322 14.1 13.5C14.1 13.6591 14.0368 13.8117 13.9243 13.9243C13.8117 14.0368 13.6591 14.1 13.5 14.1C13.3409 14.1 13.1883 14.0368 13.0757 13.9243C12.9632 13.8117 12.9 13.6591 12.9 13.5C12.8984 13.1102 13.0054 12.7276 13.2089 12.3951C13.4124 12.0627 13.7045 11.7934 14.0524 11.6175C14.4002 11.4416 14.7902 11.366 15.1786 11.3992C15.567 11.4323 15.9386 11.5729 16.2516 11.8053C16.5646 12.0376 16.8068 12.3525 16.951 12.7146C17.0952 13.0768 17.1358 13.472 17.0681 13.8559C17.0005 14.2398 16.8274 14.5973 16.5681 14.8884C16.3088 15.1795 15.9736 15.3926 15.6 15.504Z"
                                                  fill="white"/>
                                        </svg>

                                    </div>
                                </div>
                            </div>
                            <div class="price__bonuses-desc">
                                На счету 5 000 бонусов
                            </div>
                            <div class="price__bonuses-close">
                                <div>
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.88173 5.9864L11.8557 1.0257C11.954 0.911231 12.0054 0.76398 11.9996 0.613378C11.9937 0.462776 11.9311 0.319916 11.8243 0.213345C11.7174 0.106774 11.5742 0.0443419 11.4232 0.0385248C11.2722 0.0327077 11.1245 0.0839342 11.0097 0.181967L6.03573 5.14266L1.06173 0.175983C0.948744 0.063303 0.795507 0 0.635726 0C0.475945 0 0.322708 0.063303 0.209726 0.175983C0.0967439 0.288663 0.0332711 0.44149 0.0332711 0.600844C0.0332711 0.760197 0.0967439 0.913024 0.209726 1.0257L5.18973 5.9864L0.209726 10.9471C0.146917 11.0007 0.0959048 11.0668 0.0598909 11.141C0.0238769 11.2152 0.00363881 11.2961 0.000447115 11.3785C-0.00274458 11.4609 0.0111787 11.5431 0.0413434 11.6199C0.0715082 11.6967 0.117263 11.7664 0.175736 11.8247C0.234209 11.8831 0.304137 11.9287 0.381132 11.9588C0.458127 11.9889 0.540527 12.0027 0.623158 11.9996C0.70579 11.9964 0.786869 11.9762 0.861308 11.9403C0.935747 11.9044 1.00194 11.8535 1.05573 11.7908L6.03573 6.83014L11.0097 11.7908C11.1245 11.8889 11.2722 11.9401 11.4232 11.9343C11.5742 11.9285 11.7174 11.866 11.8243 11.7595C11.9311 11.6529 11.9937 11.51 11.9996 11.3594C12.0054 11.2088 11.954 11.0616 11.8557 10.9471L6.88173 5.9864Z"
                                              fill="#005DFF"/>
                                    </svg>

                                </div>
                            </div>
                            <div class="price__result vis">
                                <h4>Итоговая сумма рассрочки</h4>
                                <div class="price__result-num">11 456 руб</div>
                            </div>
                            <div class="price__bonuses-info-m">
                                Платформа автоматически определяет товары для оплаты бонусами.
                            </div>

                        </div>

                    </div>

                </div>
            </div>
            <div class="installment__calculator-info-footer">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.4026 2.29279L20.0816 6.39009L23.9889 8.29014L22.0186 12.0053L24 15.7205L20.0594 17.6205L19.3803 21.7178L15.0501 21.0703L11.9666 24L8.87198 21.0279L4.57514 21.7072L3.88497 17.5781L0 15.6886L1.98145 11.9735L0.0111317 8.29014L3.91837 6.36886L4.5974 2.30341L8.90538 2.98275L12 0L15.0835 2.94029L19.4026 2.29279ZM9.21707 6.69792C8.77422 6.69792 8.34951 6.86567 8.03637 7.16427C7.72323 7.46287 7.54731 7.86786 7.54731 8.29014C7.54731 8.71242 7.72323 9.11741 8.03637 9.41601C8.34951 9.7146 8.77422 9.88235 9.21707 9.88235C9.65991 9.88235 10.0846 9.7146 10.3978 9.41601C10.7109 9.11741 10.8868 8.71242 10.8868 8.29014C10.8868 7.86786 10.7109 7.46287 10.3978 7.16427C10.0846 6.86567 9.65991 6.69792 9.21707 6.69792ZM14.7829 14.1283C14.3401 14.1283 13.9154 14.296 13.6022 14.5946C13.2891 14.8932 13.1132 15.2982 13.1132 15.7205C13.1132 16.1428 13.2891 16.5477 13.6022 16.8463C13.9154 17.1449 14.3401 17.3127 14.7829 17.3127C15.2258 17.3127 15.6505 17.1449 15.9636 16.8463C16.2768 16.5477 16.4527 16.1428 16.4527 15.7205C16.4527 15.2982 16.2768 14.8932 15.9636 14.5946C15.6505 14.296 15.2258 14.1283 14.7829 14.1283ZM8.00371 17.3127L17.5659 8.1946L15.9963 6.69792L6.43414 15.816L8.00371 17.3127Z"
                          fill="#FF5252"/>
                </svg>
                <span>все проценты за вас платит <span class="blue">vincko:</span></span>
            </div>
            (/\/\здесь заканчивается/\/\)
            <div class="forms">
                <div class="form" id="form-1">
                    <h4>Шаг 1. Регион доставки</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>

                    <div class="form__content">
                        <form>
                            <div class="form__section">

                                <h4>Адрес доставки</h4>
                                <div class="form__section__content address-registration">
                                    <input type="text" name="city" placeholder="Город/населенный пункт">
                                    <input type="text" name="street" placeholder="Улица"><br>
                                    <input type="text" name="house" placeholder="Дом">
                                    <input type="text" name="housing" placeholder="Корпус">
                                    <input type="text" name="flat" placeholder="Квартира">
                                    <input type="text" name="index" placeholder="Индекс"><br>
                                </div>
                                (\/\/при оформления страховки добавляются 2 блока внизу\/\/)
                                <div class="form__section">
                                    <h4>Паспортные данные</h4>

                                    <div class="form__section__content passport">

                                        <input type="text" name="number" placeholder="Серия и номер паспорта">
                                        <input class="date" type="text" name="date" placeholder="Дата выдачи"
                                               onfocus="(this.type='date')" onblur="(this.type='text')">
                                        <input type="text" name="whom" placeholder="Кем выдан">
                                        <input type="text" name="code" placeholder="Код подразделения">
                                        <div class="address-registration">
                                            <input type="text" name="birthday" placeholder="Дата рождения">
                                            <input type="text" name="place" placeholder="Место рождения"><br>
                                        </div>

                                    </div>
                                </div>
                                <div class="form__section">
                                    <h4>Адрес регистрации</h4>
                                    <div class="form__section__content address-registration">
                                        <input type="text" name="city" placeholder="Город/населенный пункт">
                                        <input type="text" name="street" placeholder="Улица"><br>
                                        <input type="text" name="house" placeholder="Дом">
                                        <input type="text" name="housing" placeholder="Корпус">
                                        <input type="text" name="flat" placeholder="Квартира"><br>
                                        <input class="date" type="text" name="date" placeholder="Дата регистрации"
                                               onfocus="(this.type='date')"
                                               onblur="(this.type='text')" onmouseover="(this.type='date')"
                                               onmouseout="(this.type='text')">
                                        <input type="text" name="index" placeholder="Индекс">
                                    </div>
                                    <h4>Адрес фактического проживания</h4>
                                    <div class="form__section__content address-residense">
                                        <input type="checkbox" name="same" id="same" checked>
                                        <label for="same">Совпадает с адресом постоянной регистрации</label>
                                        <div class="no-checked address-registration">
                                            <input type="text" name="city" placeholder="Город/населенный пункт">
                                            <input type="text" name="street" placeholder="Улица"><br>
                                            <input type="text" name="house" placeholder="Дом">
                                            <input type="text" name="housing" placeholder="Корпус">
                                            <input type="text" name="flat" placeholder="Квартира"><br>
                                            <input class="date" type="text" name="date" placeholder="Дата регистрации"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')">
                                            <input type="text" name="index" placeholder="Индекс">
                                        </div>
                                        <p>Если адрес фактического проживания не совпадает с адресом регистрации -
                                            снимите
                                            галочку и укажите
                                            достоверную информацию. Это важно.</p>
                                    </div>
                                    <h4>Адрес квартиры, для которой вы оформляете страховку</h4>
                                    <div class="form__section__content address-installment">
                                        <input checked type="radio" name="address-installment" value="1" id="permanent">
                                        <label for="permanent"></label>
                                        <label for="permanent">Совпадает с адресом постоянной регистрации</label>
                                        <br>
                                        <input type="radio" name="address-installment" value="1" id="actual">
                                        <label for="actual"></label>
                                        <label for="actual">Совпадает с адресом фактического проживания</label>
                                        <br>
                                        <input type="radio" name="address-installment" value="1" id="other">
                                        <label for="other"></label>
                                        <label for="other">Указать другой адрес</label>
                                        <p>Если адрес объекта страхования не совпадает с адресом регистрации или адресом
                                            фактического
                                            проживания - выберите пункт <span>“Указать другой адрес”</span>. Это важно.
                                        </p>
                                        <div class="address-registration address-installment-other">
                                            <input type="text" name="city" placeholder="Город/населенный пункт">
                                            <input type="text" name="street" placeholder="Улица"><br>
                                            <input type="text" name="house" placeholder="Дом">
                                            <input type="text" name="housing" placeholder="Корпус">
                                            <input type="text" name="flat" placeholder="Квартира"><br>
                                            <input class="date" type="text" name="date" placeholder="Дата регистрации"
                                                   onfocus="(this.type='date')" onblur="(this.type='text')">
                                            <input type="text" name="index" placeholder="Индекс">
                                        </div>
                                    </div>
                                </div>
                                (/\/\здесь заканчивается/\/\)
                            </div>


                        </form>
                    </div>
                </div>

                <div class="form" id="form-2">
                    <h4>Шаг 2. Контактная информация</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>

                    <div class="form__content">
                        <form>
                            <div class="form__section">
                                <h4>Ваши персональные данные для связи</h4>
                                <div class="form__section__content name">
                                    <input type="text" name="surname" placeholder="Фамилия">
                                    <input type="text" name="name" placeholder="Имя">
                                    <input type="text" name="patronomic" placeholder="Отчество">
                                    <input type="text" name="mail" placeholder="E-mail"><br>
                                    <input type="text" name="phone" placeholder="Телефон">
                                    <button class="button blue-border-button">Отправить sms</button>
                                    <p>Для продолжения оформления на указанный номер телефона будет отправлен
                                        SMS-код.</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="form" id="form-3">
                    <h4>Шаг 3. Оформление</h4>
                    <div class="close-btn close-btn_hide">Развернуть</div>
                    <div class="form__content">
                        <form>
                            <div class="form__section">
                                <h4>Доставка</h4>
                                <div class="form__section__content education">
                                    <div class="select-wrapper">
                                        <select required>
                                            <option value="" disabled selected hidden>Тип доставки
                                            </option>
                                            <option value="1">Самовывоз</option>
                                            <option value="2">СДЭК</option>
                                            <option value="3">ПЭК</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="form__content">
                        <form>
                            <div class="form__section">
                                <h4>Оплата</h4>
                                <div class="form__section__content">
                                    <div class="select">
                                        <input id='sale-1' type="radio" name="sale" selected>
                                        <label for="sale-1">Наличные</label>
                                        <input id='sale-2' type="radio" name="sale">
                                        <label for="sale-2">Карта</label>
                                        <input id='sale-3' type="radio" name="sale">
                                        <label for="sale-3">Сбербонусы</label>
                                    </div>

                                    <div class="select-wrapper">
                                        <select required>
                                            <option value="" disabled selected hidden>Тип оплаты
                                            </option>
                                            <option value="1">Наличные</option>
                                            <option value="2">Карта</option>
                                            <option value="3">Сбербонусы</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="installment__right-column">
            <div class="short-rd ">
                <div id="short-rd" class="short-rd__item hidden">
                    <div class="short-rd__head">
                        <picture class="short-rd__head-pic">
                            <img src="/upload/installment/short-rd-main-pic.png" alt="main-pic">
                        </picture>

                        <div class="short-rd__title">
                            <div class="short-rd__title-up">Спокойствие</div>
                            <div class="short-rd__title-down">Комфорт</div>
                        </div>
                    </div>
                    <div class="short-rd__body">
                        <div class="short-rd__body-start">
                            Вариант решения включает:
                        </div>
                        <div class="short-rd__body-items">
                            <div class="short-rd__body-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                          fill="#005DFF"/>
                                </svg>
                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Оборудование
                                    </div>
                                    <div class="short-rd__body-li-product">Livi Smart Security PLUS
                                    </div>
                                </div>
                            </div>
                            <div class="short-rd__body-item">
                                <svg width="14" height="18" viewBox="0 0 14 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                          fill="#005DFF"/>
                                </svg>

                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Договор с охранной компанией
                                    </div>
                                    <div class="short-rd__body-li-product">ООО “Максимилиан”
                                    </div>
                                    <div class="short-rd__body-li-desc">6 месяцев (с 06.05.2021)</div>
                                </div>
                            </div>
                            <div class="short-rd__body-item">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M11.5663 3.5761C11.9377 3.42088 12.2972 3.24758 12.6039 3.05756C12.909 2.86847 13.2074 2.63536 13.3957 2.34899C13.603 2.0336 13.684 1.6318 13.4769 1.22695C13.2975 0.876124 12.9414 0.608665 12.5078 0.388826C11.5891 -0.0770006 10.7591 -0.101562 10.0456 0.194426C9.35762 0.479842 8.85074 1.03333 8.48768 1.58556C8.29384 1.88042 8.13243 2.18795 8 2.47943C7.86758 2.18795 7.70616 1.88042 7.51232 1.58556C7.14926 1.03333 6.64238 0.479842 5.95436 0.194426C5.24085 -0.101562 4.41091 -0.0770006 3.49215 0.388826C3.05856 0.608665 2.70245 0.876124 2.52306 1.22695C2.31605 1.6318 2.397 2.0336 2.60435 2.34899C2.79262 2.63536 3.09102 2.86847 3.39615 3.05756C3.70278 3.24758 4.06233 3.42088 4.43369 3.5761H0.533333C0.238781 3.5761 0 3.81488 0 4.10943V6.81354C0 7.10809 0.238781 7.34687 0.533333 7.34687H1.06667V15.4667C1.06667 15.7612 1.30545 16 1.6 16H14.4C14.6946 16 14.9333 15.7612 14.9333 15.4667V7.34687H15.4667C15.7612 7.34687 16 7.10809 16 6.81354V4.10943C16 3.81488 15.7612 3.5761 15.4667 3.5761H11.5663ZM7.46667 4.64276V6.2802H1.06667V4.64276H7.46667ZM8.53333 6.2802V4.64276H14.9333V6.2802H8.53333ZM7.46667 7.34687H2.13333V14.9333H7.46667V7.34687ZM8.53333 14.9333V7.34687H13.8667V14.9333H8.53333ZM7.2136 3.36714C7.07356 2.99482 6.87813 2.56261 6.62102 2.17153C6.31741 1.70972 5.95762 1.35058 5.54564 1.17968C5.15915 1.01935 4.65576 0.994786 3.97452 1.34019C3.60811 1.52597 3.49755 1.66412 3.47277 1.71257L3.4709 1.71638C3.47362 1.7242 3.48023 1.73956 3.49565 1.76302C3.55738 1.85691 3.70065 1.99139 3.95802 2.15088C4.20601 2.30456 4.51917 2.45681 4.87103 2.60277C5.57415 2.89445 6.38281 3.14107 7.0238 3.31607C7.08905 3.33389 7.15242 3.35092 7.2136 3.36714ZM8.7864 3.36714C8.84758 3.35092 8.91095 3.33389 8.9762 3.31607C9.61719 3.14107 10.4259 2.89445 11.129 2.60277C11.4808 2.45681 11.794 2.30456 12.042 2.15088C12.2994 1.99139 12.4426 1.85691 12.5044 1.76302C12.5198 1.73956 12.5264 1.7242 12.5291 1.71637L12.5272 1.71257C12.5025 1.66412 12.3919 1.52597 12.0255 1.34019C11.3442 0.994786 10.8409 1.01935 10.4544 1.17968C10.0424 1.35058 9.68259 1.70972 9.37898 2.17153C9.12187 2.56261 8.92644 2.99482 8.7864 3.36714Z"
                                          fill="#FF5252"/>
                                </svg>


                                <div class="short-rd__body-li">
                                    <div class="short-rd__body-li-title">
                                        Страхование недвижимости
                                    </div>
                                    <div class="short-rd__body-li-product">Страховой дом “ВСК”
                                    </div>
                                    <div class="short-rd__body-li-desc">
                                        Полис на 12 месяцев (с 06.05.2021)<br>
                                        Выплата 2 100 000 рублей
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="short-rd__gift">
                        <div class="short-rd__gift-title">
                            В подарок:
                        </div>

                        <div class="short-rd__gift-items">
                            <span class="short-rd__gift-item">1 мес. охранных услуг</span>
                            <span class="short-rd__gift-item">страховка</span>
                            <span class="short-rd__gift-item">доставка</span>
                            <span class="short-rd__gift-item">монтаж</span>
                        </div>
                    </div>

                    <div class="short-rd__footer">

                        <a href="" class="short-rd-another">
                            <svg width="14" height="12" viewBox="0 0 14 12" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M5.29289 11.7071C5.68342 12.0976 6.31658 12.0976 6.70711 11.7071C7.09763 11.3166 7.09763 10.6834 6.70711 10.2929L3.41421 7L13 7C13.5523 7 14 6.55228 14 6C14 5.44771 13.5523 5 13 5L3.41421 5L6.70711 1.70711C7.09763 1.31658 7.09763 0.683417 6.70711 0.292893C6.31658 -0.0976321 5.68342 -0.0976322 5.29289 0.292893L0.293739 5.29205C0.291278 5.2945 0.28883 5.29697 0.286396 5.29945C0.109253 5.47987 5.48388e-07 5.72718 5.24537e-07 6C5.12683e-07 6.13559 0.0269866 6.26488 0.0758796 6.38278C0.12432 6.49986 0.195951 6.6096 0.290776 6.70498M5.29289 11.7071L0.293092 6.7073L5.29289 11.7071Z"
                                      fill="#005DFF"/>
                            </svg>
                            Выбрать другое
                        </a>
                    </div>

                </div>
            </div>

            <div class="installment__rules installment__rules--active">
                <div class="installment__rules-wall"></div>
                <p>
                    Я даю согласие САО «ВСК», находящемуся по адресу 121552, г. Москва, ул. Островная, д. 4, на
                    обработку моих персональных данных, включая сбор, систематизацию, накопление, хранение, уточнение
                    (обновление, изменение), использование, распространение (в том числе передачу), обезличивание,
                    блокирование, уничтожение, внесение в информационную систему, обработку с использованием средств
                    автоматизации или без использования таких средств, в том числе на основании исключительно
                    автоматизированной обработки, персональных данных указанных в заявлении (договоре, полисе), в
                    соответствие с Федеральным законом от 27.07.2006 г. №152-ФЗ «О персональных данных». Указанные
                    данные предоставляются в целях заключения и исполнения договора страхования, а также разработки,
                    продвижения и получения информации о новых страховых продуктах и услугах, получения мной
                    рекламно-информационных рассылок. Согласие предоставляется с момента подписания настоящего полиса и
                    действует в течение пяти лет после исполнения обязательств. Согласие может быть отозвано путём
                    письменного заявления в САО «ВСК». Подтверждаю ознакомление и согласие
                    <a class="installment__rules-agree" href="">с правилами страховки</a>
                    За достоверность указанных в заявлении персональных данных страхователя, включая серию и номер
                    паспорта, мобильный телефон, e-mail ответственность несет страхователь.
                </p>
                <input type="checkbox" id="agreement">
                <label for="agreement" class="installment__rules-agreement">
                    Я даю согласие и подтверждаю достоверность указанных данных
                </label>
                <button href="" class="button yellow-button">Оформить заказ</button>
            </div>
        </div>
    </div>

</main>
<!---->
<? // require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
<!--	<main class="container main">-->

<? //$APPLICATION->IncludeComponent(
//	"bitrix:sale.order.ajax",
//	"",
//	array(
//		"ACTION_VARIABLE" => "soa-action",
//		"ADDITIONAL_PICT_PROP_10" => "-",
//		"ADDITIONAL_PICT_PROP_11" => "-",
//		"ADDITIONAL_PICT_PROP_12" => "-",
//		"ADDITIONAL_PICT_PROP_13" => "-",
//		"ADDITIONAL_PICT_PROP_14" => "-",
//		"ADDITIONAL_PICT_PROP_15" => "-",
//		"ADDITIONAL_PICT_PROP_24" => "-",
//		"ALLOW_APPEND_ORDER" => "Y",
//		"ALLOW_AUTO_REGISTER" => "Y",
//		"ALLOW_NEW_PROFILE" => "N",
//		"ALLOW_USER_PROFILES" => "N",
//		"BASKET_IMAGES_SCALING" => "adaptive",
//		"BASKET_POSITION" => "before",
//		"COMPATIBLE_MODE" => "N",
//		"DELIVERIES_PER_PAGE" => "9",
//		"DELIVERY_FADE_EXTRA_SERVICES" => "N",
//		"DELIVERY_NO_AJAX" => "N",
//		"DELIVERY_NO_SESSION" => "Y",
//		"DELIVERY_TO_PAYSYSTEM" => "p2d",
//		"DISABLE_BASKET_REDIRECT" => "N",
//		"EMPTY_BASKET_HINT_PATH" => "/",
//		"HIDE_ORDER_DESCRIPTION" => "N",
//		"MESS_ADDITIONAL_PROPS" => "Дополнительные свойства",
//		"MESS_AUTH_BLOCK_NAME" => "Авторизация",
//		"MESS_AUTH_REFERENCE_1" => "Символом \"звездочка\" (*) отмечены обязательные для заполнения поля.",
//		"MESS_AUTH_REFERENCE_2" => "После регистрации вы получите информационное письмо.",
//		"MESS_AUTH_REFERENCE_3" => "Личные сведения, полученные в распоряжение интернет-магазина при регистрации или каким-либо иным образом, не будут без разрешения пользователей передаваться третьим организациям и лицам за исключением ситуаций, когда этого требует закон или судебное решение.",
//		"MESS_BACK" => "Назад",
//		"MESS_BASKET_BLOCK_NAME" => "Состав заказа",
//		"MESS_BUYER_BLOCK_NAME" => "Контакты покупателя",
//		"MESS_COUPON" => "Купон",
//		"MESS_DELIVERY_BLOCK_NAME" => "Вид доставки",
//		"MESS_DELIVERY_CALC_ERROR_TEXT" => "Вы можете продолжить оформление заказа, а чуть позже менеджер магазина свяжется с вами и уточнит информацию по доставке.",
//		"MESS_DELIVERY_CALC_ERROR_TITLE" => "Не удалось рассчитать стоимость доставки.",
//		"MESS_ECONOMY" => "Экономия",
//		"MESS_EDIT" => "изменить",
//		"MESS_FAIL_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически.<br />Обратите внимание на развернутый блок с информацией о заказе. Здесь вы можете внести необходимые изменения или оставить как есть и нажать кнопку \"#ORDER_BUTTON#\".",
//		"MESS_FURTHER" => "Продолжить",
//		"MESS_INNER_PS_BALANCE" => "На вашем пользовательском счете:",
//		"MESS_NAV_BACK" => "Назад",
//		"MESS_NAV_FORWARD" => "Вперед",
//		"MESS_NEAREST_PICKUP_LIST" => "Ближайшие пункты:",
//		"MESS_ORDER" => "Оформить заказ",
//		"MESS_ORDER_DESC" => "Комментарии к заказу:",
//		"MESS_PAYMENT_BLOCK_NAME" => "Оплата",
//		"MESS_PAY_SYSTEM_PAYABLE_ERROR" => "Вы сможете оплатить заказ после того, как менеджер проверит наличие полного комплекта товаров на складе. Сразу после проверки вы получите письмо с инструкциями по оплате. Оплатить заказ можно будет в персональном разделе сайта.",
//		"MESS_PERIOD" => "Срок доставки",
//		"MESS_PERSON_TYPE" => "Тип плательщика",
//		"MESS_PICKUP_LIST" => "Пункты самовывоза:",
//		"MESS_PRICE" => "Стоимость",
//		"MESS_PRICE_FREE" => "бесплатно",
//		"MESS_REGION_BLOCK_NAME" => "Регион доставки",
//		"MESS_REGION_REFERENCE" => "Выберите свой город в списке. Если вы не нашли свой город, выберите \"другое местоположение\", а город впишите в поле \"Город\"",
//		"MESS_REGISTRATION_REFERENCE" => "Если вы впервые на сайте, и хотите, чтобы мы вас помнили и все ваши заказы сохранялись, заполните регистрационную форму.",
//		"MESS_REG_BLOCK_NAME" => "Регистрация",
//		"MESS_SELECT_PICKUP" => "Выбрать",
//		"MESS_SELECT_PROFILE" => "Выберите профиль",
//		"MESS_SUCCESS_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически.<br />Если все заполнено верно, нажмите кнопку \"#ORDER_BUTTON#\".",
//		"MESS_USE_COUPON" => "Применить купон",
//		"ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
//		"PATH_TO_AUTH" => "/reg/",
//		"PATH_TO_BASKET" => "",
//		"PATH_TO_PAYMENT" => "payment.php",
//		"PATH_TO_PERSONAL" => "index.php",
//		"PAY_FROM_ACCOUNT" => "Y",
//		"PAY_SYSTEMS_PER_PAGE" => "9",
//		"PICKUPS_PER_PAGE" => "5",
//		"PICKUP_MAP_TYPE" => "yandex",
//		"PRODUCT_COLUMNS_HIDDEN" => array(
//		),
//		"PRODUCT_COLUMNS_VISIBLE" => array(
//			0 => "DISCOUNT_PRICE_PERCENT_FORMATED",
//			1 => "PRICE_FORMATED",
//		),
//		"PROPS_FADE_LIST_3" => array(
//			0 => "20",
//			1 => "21",
//			2 => "22",
//		),
//		"SEND_NEW_USER_NOTIFY" => "N",
//		"SERVICES_IMAGES_SCALING" => "adaptive",
//		"SET_TITLE" => "Y",
//		"SHOW_BASKET_HEADERS" => "N",
//		"SHOW_COUPONS" => "N",
//		"SHOW_COUPONS_BASKET" => "Y",
//		"SHOW_COUPONS_DELIVERY" => "Y",
//		"SHOW_COUPONS_PAY_SYSTEM" => "Y",
//		"SHOW_DELIVERY_INFO_NAME" => "Y",
//		"SHOW_DELIVERY_LIST_NAMES" => "Y",
//		"SHOW_DELIVERY_PARENT_NAMES" => "Y",
//		"SHOW_MAP_IN_PROPS" => "Y",
//		"SHOW_NEAREST_PICKUP" => "Y",
//		"SHOW_NOT_CALCULATED_DELIVERIES" => "N",
//		"SHOW_ORDER_BUTTON" => "final_step",
//		"SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
//		"SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
//		"SHOW_PICKUP_MAP" => "Y",
//		"SHOW_STORES_IMAGES" => "Y",
//		"SHOW_TOTAL_ORDER_BUTTON" => "N",
//		"SHOW_VAT_PRICE" => "N",
//		"SKIP_USELESS_BLOCK" => "N",
//		"SPOT_LOCATION_BY_GEOIP" => "Y",
//		"TEMPLATE_LOCATION" => "popup",
//		"TEMPLATE_THEME" => "site",
//		"USER_CONSENT" => "Y",
//		"USER_CONSENT_ID" => "1",
//		"USER_CONSENT_IS_CHECKED" => "Y",
//		"USER_CONSENT_IS_LOADED" => "N",
//		"USE_CUSTOM_ADDITIONAL_MESSAGES" => "Y",
//		"USE_CUSTOM_ERROR_MESSAGES" => "Y",
//		"USE_CUSTOM_MAIN_MESSAGES" => "Y",
//		"USE_ENHANCED_ECOMMERCE" => "N",
//		"USE_PHONE_NORMALIZATION" => "Y",
//		"USE_PRELOAD" => "N",
//		"USE_PREPAYMENT" => "N",
//		"USE_YM_GOALS" => "N",
//		"COMPONENT_TEMPLATE" => "vincko",
//		"SHOW_MAP_FOR_DELIVERIES" => array(
//			0 => "7",
//			1 => "9",
//		)
//	),
//	false
//);?>
<!--	</main>-->
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
