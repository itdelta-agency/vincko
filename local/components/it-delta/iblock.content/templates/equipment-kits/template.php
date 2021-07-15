<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix component iblock.content (webgsite.ru)
 * Компонент для битрикс, работа с инфоблоком одностраничный вывод
 *
 * @author    Falur <ienakaev@ya.ru>
 * @link      https://github.com/falur/bitrix.com.iblock.content
 * @copyright 2015 - 2016 webgsite.ru
 * @license   GNU General Public License http://www.gnu.org/licenses/gpl-2.0.html
 */
//
//echo '<pre>';
//print_r($arResult);
//echo '</pre>';
?>
<main class="container complect-obor">
    <section class="safe__pay rating-top">
        <div class="safe__pay_left">
            <div class="safe__pay_left-text">
                <h1 class="h1">
                    Комплекты <br>
                    охранного <br>
                    оборудования<br>
                </h1>
                <p class="text">
                    Узнайте, что умеют делать наши комплекты охранного оборудования и выберите подходящий вариант
                </p>
            </div>
            <div class="safe__pay_left-img">
                <picture>
                    <img src="/upload/images/equipment/equipment.svg" alt="img" loading="lazy">
                </picture>
            </div>
        </div>
        <div class="safe__pay_right" style="background-image: none;">
            <div class="h3">
                Готовые <br>
                решения <br>
                для охраны
            </div>
            <p class="text">
                Созданы для вас с целью решения задач оптимальным образом. Один из вариантов точно удовлетворит Ваши
                потребности.
            </p>
            <a href="" class="button">узнать больше</a>
        </div>
    </section>


    <div class="equipmnet-kits">
        <?php foreach ($arResult['SECTIONS'] as $section): ?>
            <section class="ready-pack ready-pack--global">
                <div class="ready-pack__head">
                    <div class="ready-pack__title">
                        <div class="ready-pack__title-up">Набор оборудования для готового решения</div>
                        <h2 class="h2 ready-pack__title-down"><?= $section['NAME'] ?></h2>
                    </div>
                    <div class="ready-des2__show-list">
                        <div class="ready-des2__show-list-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                      fill="#F5C000"/>
                            </svg>
                            Панель управления с клавиатурой
                        </div>
                        <div class="ready-des2__show-list-item">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                      fill="#F5C000"/>
                            </svg>
                            Датчик движения
                        </div>
                        <div class="ready-des2__show-list-item">
                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                                      fill="#F5C000" stroke="#F5C000"/>
                            </svg>
                            Датчик открытия двери
                        </div>
                        <div class="ready-des2__show-list-item">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                      fill="#F5C000"/>
                            </svg>
                            Датчик пожара
                        </div>
                        <div class="ready-des2__show-list-item">
                            <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                                      fill="#F5C000"/>
                            </svg>
                            Датчик протечки воды
                        </div>
                        <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                                      fill="#F5C000"/>
                            </svg>
                            Фотоподтверждение
                        </div>
                        <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                            <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                                      fill="#F5C000" stroke="#F5C000"/>
                            </svg>
                            Брелок управления
                        </div>

                    </div>
                    <div class="ready-pack__items">
                        <?php foreach ($section['EQUIPMENT-KITS'] as $item): ?>

                            <div class="ready-pack__item">
                                <pre>
                            <?print_r($item['CO_CLASS_REF'])?>
                        </pre>
                                <div class="ready-pack__top">
                                    <picture>
                                        <source srcset="<?= $item['PICTURE_SRC'] ?>">
                                        <img src="<?= $item['PICTURE_SRC'] ?>" alt="var-image-1">
                                    </picture>
                                    <div class="ready-pack__top-title">
                                        <div class="text">Вариант</div>
                                        <div class="ready-pack__global-type">
                                            Комфорт
                                        </div>
                                        <div class="h4"><?= $item['NAME'] ?></div>
                                    </div>
                                </div>
                                <div class="ready-pack__mid">
                                    <ul class="ready-pack__mid-list" data-list="1">

                                        <li>
                                            <div class="img">
                                                <picture>
                                                    <source srcset="../img/complect_obor/photo.svg">
                                                    <img src="../img/complect_obor/photo.svg" alt="photo">
                                                </picture>
                                            </div>
                                            <div class="text">Присылает анимированную серию фотографий</div>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <picture>
                                                    <source srcset="../img/complect_obor/photo.svg">
                                                    <img src="../img/complect_obor/photo.svg" alt="photo">
                                                </picture>
                                            </div>
                                            <div class="text">Присылает анимированную серию фотографий</div>
                                        </li>
                                        <li>
                                            <div class="img">
                                                <picture>
                                                    <source srcset="../img/complect_obor/wi-fi.svg">
                                                    <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                                </picture>
                                            </div>
                                            <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                                        </li>
                                    </ul>

                                    <div class="ready-pack__switch">
                                        <div class="ready-pack__open">Развернуть
                                            <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                                      fill="#A0A0A0"/>
                                            </svg>

                                        </div>

                                        <div class="ready-pack__close">Свернуть
                                            <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                                      fill="#A0A0A0"/>
                                            </svg>

                                        </div>
                                    </div>

                                    <div class="predloj__present">
                                        <div class="present__text">
                                            <div class="h5">В подарок:</div>
                                            <ul>
                                                <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                                <li><span>&#10003;</span> страховка</li>
                                                <li><span>&#10003;</span> доставка</li>
                                                <li><span>&#10003;</span> монтаж</li>
                                            </ul>
                                        </div>
                                        <picture>
                                            <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                            <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                                        </picture>
                                    </div>
                                </div>

                                <div class="ready-pack__bottom">
                                    <div class="ready-pack__bottom-left">
                                        <div class="ready-pack__bottom-all">
                                            Всего
                                        </div>

                                        <div class="ready-pack__bottom-result">
                                            20 000 ₽

                                            <span class="ready-pack__bottom-or">
                                    или
                                </span>
                                        </div>
                                    </div>

                                    <div class="ready-pack__bottom-right">
                                        <div class="solutions__bottom_column">

                                            <div class="solutions__bottom_column-interest">
                                                <p>все проценты<br>
                                                    за вас платит <span class="blue-vinco">vincko:</span>
                                                </p>
                                            </div>
                                            <div class="solutions__bottom_column-monthprice">
                                                <select name="solutions__bottom_column-select" class="solutions__bottom_column-select">
                                                    <option selected value="12">12 мес.</option>
                                                    <option value="6">6 мес.</option>
                                                </select>
                                                <p>по</p>
                                                <div class="solutions__bottom_column-price">
                                                    1 000 ₽
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <button class="ready-pack__bottom-button button yellow-button">
                                        ПОДРОБНЕЕ
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>




    <div class="ready-pack__items">
        <div class="ready-pack__item">
            <div class="ready-pack__top">
                <picture>
                    <source srcset="../img/complect_obor/comfort.svg">
                    <img src="../img/complect_obor/comfort.svg" alt="var-image-1">
                </picture>
                <div class="ready-pack__top-title">
                    <div class="text">Вариант</div>
                    <div class="ready-pack__global-type">
                        Комфорт
                    </div>
                    <div class="h4">AJAX StarterKit Cam</div>
                </div>
            </div>
            <div class="ready-pack__mid">
                <ul class="ready-pack__mid-list" data-list="1">

                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/wi-fi.svg">
                                <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                            </picture>
                        </div>
                        <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                    </li>
                </ul>

                <div class="ready-pack__switch">
                    <div class="ready-pack__open">Развернуть
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>

                    <div class="ready-pack__close">Свернуть
                        <svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>
                </div>

                <div class="predloj__present">
                    <div class="present__text">
                        <div class="h5">В подарок:</div>
                        <ul>
                            <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                            <li><span>&#10003;</span> страховка</li>
                            <li><span>&#10003;</span> доставка</li>
                            <li><span>&#10003;</span> монтаж</li>
                        </ul>
                    </div>
                    <picture>
                        <source type="image/svg" srcset="../img/ready-des/pic.svg">
                        <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                    </picture>
                </div>
            </div>

            <div class="ready-pack__bottom">
                <div class="ready-pack__bottom-left">
                    <div class="ready-pack__bottom-all">
                        Всего
                    </div>

                    <div class="ready-pack__bottom-result">
                        20 000 ₽

                        <span class="ready-pack__bottom-or">
                                    или
                                </span>
                    </div>
                </div>

                <div class="ready-pack__bottom-right">
                    <div class="solutions__bottom_column">

                        <div class="solutions__bottom_column-interest">
                            <p>все проценты<br>
                                за вас платит <span class="blue-vinco">vincko:</span>
                            </p>
                        </div>
                        <div class="solutions__bottom_column-monthprice">
                            <select name="solutions__bottom_column-select" class="solutions__bottom_column-select">
                                <option selected value="12">12 мес.</option>
                                <option value="6">6 мес.</option>
                            </select>
                            <p>по</p>
                            <div class="solutions__bottom_column-price">
                                1 000 ₽
                            </div>
                        </div>

                    </div>
                </div>

                <button class="ready-pack__bottom-button button yellow-button">
                    ПОДРОБНЕЕ
                </button>
            </div>
        </div>

        <div class="ready-pack__item">
            <div class="ready-pack__top">
                <picture>
                    <source srcset="../img/complect_obor/business.svg">
                    <img src="../img/complect_obor/business.svg" alt="var-image-1">
                </picture>
                <div class="ready-pack__top-title">
                    <div class="text">Вариант</div>
                    <div class="ready-pack__global-type">
                        Бизнес
                    </div>
                    <div class="h4">AJAX StarterKit Cam</div>
                </div>
            </div>
            <div class="ready-pack__mid">
                <ul class="ready-pack__mid-list" data-list="1">
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/union.svg">
                                <img src="../img/complect_obor/union.svg" alt="union">
                            </picture>
                        </div>
                        <div class="text">Автоматизирует безопасность сценариями</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/wi-fi.svg">
                                <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                            </picture>
                        </div>
                        <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/wi-fi.svg">
                                <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                            </picture>
                        </div>
                        <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                    </li>
                </ul>

                <div class="ready-pack__switch">
                    <div class="ready-pack__open">Развернуть
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>

                    <div class="ready-pack__close">Свернуть
                        <svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>
                </div>

                <div class="predloj__present">
                    <div class="present__text">
                        <div class="h5">В подарок:</div>
                        <ul>
                            <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                            <li><span>&#10003;</span> страховка</li>
                            <li><span>&#10003;</span> доставка</li>
                            <li><span>&#10003;</span> монтаж</li>
                        </ul>
                    </div>
                    <picture>
                        <source type="image/svg" srcset="../img/ready-des/pic.svg">
                        <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                    </picture>
                </div>
            </div>

            <div class="ready-pack__bottom">
                <div class="ready-pack__bottom-left">
                    <div class="ready-pack__bottom-all">
                        Всего
                    </div>

                    <div class="ready-pack__bottom-result">
                        20 000 ₽

                        <span class="ready-pack__bottom-or">
                                    или
                                </span>
                    </div>
                </div>

                <div class="ready-pack__bottom-right">
                    <div class="solutions__bottom_column">

                        <div class="solutions__bottom_column-interest">
                            <p>все проценты<br>
                                за вас платит <span class="blue-vinco">vincko:</span>
                            </p>
                        </div>
                        <div class="solutions__bottom_column-monthprice">
                            <select name="solutions__bottom_column-select" class="solutions__bottom_column-select">
                                <option selected value="12">12 мес.</option>
                                <option value="6">6 мес.</option>
                            </select>
                            <p>по</p>
                            <div class="solutions__bottom_column-price">
                                1 000 ₽
                            </div>
                        </div>

                    </div>
                </div>

                <button class="ready-pack__bottom-button button yellow-button">
                    ПОДРОБНЕЕ
                </button>
            </div>
        </div>

        <div class="ready-pack__item">
            <div class="ready-pack__top">
                <picture>
                    <source srcset="../img/complect_obor/luxe.svg">
                    <img src="../img/complect_obor/luxe.svg " alt="var-image-1">
                </picture>
                <div class="ready-pack__top-title">
                    <div class="text">Вариант</div>
                    <div class="ready-pack__global-type">
                        Премиум
                    </div>
                    <div class="h4">AJAX StarterKit Cam</div>
                </div>
            </div>
            <div class="ready-pack__mid">
                <ul class="ready-pack__mid-list" data-list="1">
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/union.svg">
                                <img src="../img/complect_obor/union.svg" alt="union">
                            </picture>
                        </div>
                        <div class="text">Автоматизирует безопасность сценариями</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/wi-fi.svg">
                                <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                            </picture>
                        </div>
                        <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/photo.svg">
                                <img src="../img/complect_obor/photo.svg" alt="photo">
                            </picture>
                        </div>
                        <div class="text">Присылает анимированную серию фотографий</div>
                    </li>
                    <li>
                        <div class="img">
                            <picture>
                                <source srcset="../img/complect_obor/wi-fi.svg">
                                <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                            </picture>
                        </div>
                        <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                    </li>
                </ul>

                <div class="ready-pack__switch">
                    <div class="ready-pack__open">Развернуть
                        <svg width="8" height="5" viewBox="0 0 8 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>

                    <div class="ready-pack__close">Свернуть
                        <svg width="9" height="5" viewBox="0 0 9 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                  fill="#A0A0A0"/>
                        </svg>

                    </div>
                </div>

                <div class="predloj__present">
                    <div class="present__text">
                        <div class="h5">В подарок:</div>
                        <ul>
                            <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                            <li><span>&#10003;</span> страховка</li>
                            <li><span>&#10003;</span> доставка</li>
                            <li><span>&#10003;</span> монтаж</li>
                        </ul>
                    </div>
                    <picture>
                        <source type="image/svg" srcset="../img/ready-des/pic.svg">
                        <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                    </picture>
                </div>
            </div>

            <div class="ready-pack__bottom">
                <div class="ready-pack__bottom-left">
                    <div class="ready-pack__bottom-all">
                        Всего
                    </div>

                    <div class="ready-pack__bottom-result">
                        20 000 ₽

                        <span class="ready-pack__bottom-or">
                                    или
                                </span>
                    </div>
                </div>

                <div class="ready-pack__bottom-right">
                    <div class="solutions__bottom_column">

                        <div class="solutions__bottom_column-interest">
                            <p>все проценты<br>
                                за вас платит <span class="blue-vinco">vincko:</span>
                            </p>
                        </div>
                        <div class="solutions__bottom_column-monthprice">
                            <select name="solutions__bottom_column-select" class="solutions__bottom_column-select">
                                <option selected value="12">12 мес.</option>
                                <option value="6">6 мес.</option>
                            </select>
                            <p>по</p>
                            <div class="solutions__bottom_column-price">
                                1 000 ₽
                            </div>
                        </div>

                    </div>
                </div>

                <button class="ready-pack__bottom-button button yellow-button">
                    ПОДРОБНЕЕ
                </button>
            </div>
        </div>
    </div>










    <section class="ready-pack ready-pack--global">
        <div class="ready-pack__head">
            <div class="ready-pack__title">
                <div class="ready-pack__title-up">Набор оборудования для готового решения</div>
                <h2 class="h2 ready-pack__title-down">
                    Спокойствие
                </h2>
            </div>

            <div class="ready-des2__show-list">
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Панель управления с клавиатурой
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик движения
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                              fill="#F5C000" stroke="#F5C000"/>
                    </svg>
                    Датчик открытия двери
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик пожара
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик протечки воды
                </div>
                <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Фотоподтверждение
                </div>
                <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                              fill="#F5C000" stroke="#F5C000"/>
                    </svg>
                    Брелок управления
                </div>

            </div>

            <div class="ready-pack__items">
                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/comfort.svg">
                            <img src="../img/complect_obor/comfort.svg" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Комфорт
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">

                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>

                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/business.svg">
                            <img src="../img/complect_obor/business.svg" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Бизнес
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/union.svg">
                                        <img src="../img/complect_obor/union.svg" alt="union">
                                    </picture>
                                </div>
                                <div class="text">Автоматизирует безопасность сценариями</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>

                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/luxe.svg">
                            <img src="../img/complect_obor/luxe.svg " alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Премиум
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/union.svg">
                                        <img src="../img/complect_obor/union.svg" alt="union">
                                    </picture>
                                </div>
                                <div class="text">Автоматизирует безопасность сценариями</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ready-pack ready-pack--global">
        <div class="ready-pack__head">
            <div class="ready-pack__title">
                <div class="ready-pack__title-up">Набор оборудования для готового решения</div>
                <h2 class="h2 ready-pack__title-down">
                    Спокойствие
                </h2>
            </div>

            <div class="ready-des2__show-list">
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Панель управления с клавиатурой
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик движения
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                              fill="#F5C000" stroke="#F5C000"/>
                    </svg>
                    Датчик открытия двери
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик пожара
                </div>
                <div class="ready-des2__show-list-item">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M4.6654 6.60938H11.9412C13.0764 6.60938 14 7.55564 14 8.71875V15.8906C14 17.0537 13.0764 18 11.9412 18H2.05882C0.923588 18 0 17.0537 0 15.8906V8.71875C0 7.55564 0.923588 6.60938 2.05882 6.60938H3.29285V3.71848C3.29285 1.66809 4.95531 0 6.99873 0C9.04215 0 10.7046 1.66809 10.7046 3.71848V6.60938H9.33206V3.71848C9.33206 2.4435 8.28532 1.40625 6.99873 1.40625C5.71214 1.40625 4.6654 2.4435 4.6654 3.71848V6.60938ZM11.9412 16.5938C12.3196 16.5938 12.6275 16.2783 12.6275 15.8906V8.71875C12.6275 8.33105 12.3196 8.01562 11.9412 8.01562H2.05882C1.68041 8.01562 1.37255 8.33105 1.37255 8.71875V15.8906C1.37255 16.2783 1.68041 16.5938 2.05882 16.5938H11.9412ZM5.73039 11.3555C5.73039 10.6371 6.2988 10.0547 7 10.0547C7.7012 10.0547 8.26961 10.6371 8.26961 11.3555C8.26961 11.8153 8.03652 12.2191 7.68501 12.4504V13.9922C7.68501 14.3805 7.37773 14.6953 6.99873 14.6953C6.6197 14.6953 6.31246 14.3805 6.31246 13.9922V12.4488C5.96235 12.2171 5.73039 11.8142 5.73039 11.3555Z"
                              fill="#F5C000"/>
                    </svg>
                    Датчик протечки воды
                </div>
                <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M7.2 0H8.8V2.4H7.2V0ZM13.0916 1.77715L14.223 2.9085L12.5259 4.60547L11.3945 3.47412L13.0916 1.77715ZM16 7.2H13.6V8.8H16V7.2ZM0 7.2H2.4V8.8H0V7.2ZM4.60568 3.47471L2.90859 1.77773L1.77721 2.90908L3.47429 4.60605L4.60568 3.47471ZM12 11.2V8C12 5.79443 10.2056 4 8 4C5.7944 4 4 5.79443 4 8V11.2C2.67679 11.2 1.6 12.2768 1.6 13.6C1.6 14.9232 2.67679 16 4 16H12C13.3232 16 14.4 14.9232 14.4 13.6C14.4 12.2768 13.3232 11.2 12 11.2ZM5.6 8C5.6 6.67676 6.67679 5.6 8 5.6C9.32321 5.6 10.4 6.67676 10.4 8V11.2H5.6V8ZM4 14.4C3.5592 14.4 3.2 14.0416 3.2 13.6C3.2 13.1584 3.5592 12.8 4 12.8H12C12.4416 12.8 12.8 13.1584 12.8 13.6C12.8 14.0416 12.4416 14.4 12 14.4H4ZM8 6.4V7.99844L9.6 8C9.6 7.11758 8.8832 6.4 8 6.4Z"
                              fill="#F5C000"/>
                    </svg>
                    Фотоподтверждение
                </div>
                <div class="ready-des2__show-list-item  ready-des2__show-list-item--inactive">
                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.338 2.04486C4.38559 2.30735 3.11663 2.81082 2.17798 3.11892C2.09227 3.14668 2.01608 3.19796 1.95809 3.26691C1.9001 3.33586 1.86264 3.41972 1.84998 3.50892C1.29598 7.66592 2.36063 11.135 3.88763 13.133C4.53415 13.9874 5.84341 15.2852 6.713 15.9112C7.059 16.1552 7.365 16.3312 7.606 16.4442C7.726 16.5012 7.824 16.5392 7.899 16.5622C7.9318 16.5737 7.96562 16.582 8 16.5872C8.03397 16.5816 8.06742 16.5733 8.1 16.5622C8.176 16.5392 8.274 16.5012 8.394 16.4442C8.634 16.3312 8.941 16.1542 9.287 15.9112C10.1566 15.2852 11.4658 13.9874 12.1124 13.133C13.6394 11.136 14.704 7.66592 14.15 3.50892C14.1375 3.41968 14.1001 3.33577 14.042 3.2668C13.984 3.19783 13.9078 3.14658 13.822 3.11892C13.171 2.90592 11.749 2.34086 10.662 2.04586C9.552 1.74486 8.531 1.52186 8 1.52186C7.47 1.52186 6.448 1.74486 5.338 2.04586V2.04486ZM5.072 1.56C6.157 1.265 7.31 1 8 1C8.69 1 9.843 1.265 10.928 1.56C12.038 1.86 13.157 2.215 13.815 2.43C14.0901 2.52085 14.334 2.68747 14.5187 2.9107C14.7034 3.13394 14.8213 3.40474 14.859 3.692C15.455 8.169 14.072 11.487 12.394 13.682C11.6824 14.621 10.834 15.4479 9.877 16.135C9.54609 16.3728 9.19548 16.5819 8.829 16.76C8.549 16.892 8.248 17 8 17C7.752 17 7.452 16.892 7.171 16.76C6.80451 16.5819 6.45391 16.3728 6.123 16.135C5.16603 15.4478 4.31758 14.621 3.606 13.682C1.928 11.487 0.545006 8.169 1.14101 3.692C1.17869 3.40474 1.29665 3.13394 1.48132 2.9107C1.666 2.68747 1.9099 2.52085 2.185 2.43C3.1402 2.11681 4.10281 1.82672 5.072 1.56Z"
                              fill="#F5C000" stroke="#F5C000"/>
                    </svg>
                    Брелок управления
                </div>

            </div>

            <div class="ready-pack__items">
                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/comfort.svg">
                            <img src="../img/complect_obor/comfort.svg" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Комфорт
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">

                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>

                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/business.svg">
                            <img src="../img/complect_obor/business.svg" alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Бизнес
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/union.svg">
                                        <img src="../img/complect_obor/union.svg" alt="union">
                                    </picture>
                                </div>
                                <div class="text">Автоматизирует безопасность сценариями</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>

                <div class="ready-pack__item">
                    <div class="ready-pack__top">
                        <picture>
                            <source srcset="../img/complect_obor/luxe.svg">
                            <img src="../img/complect_obor/luxe.svg " alt="var-image-1">
                        </picture>
                        <div class="ready-pack__top-title">
                            <div class="text">Вариант</div>
                            <div class="ready-pack__global-type">
                                Премиум
                            </div>
                            <div class="h4">AJAX StarterKit Cam</div>
                        </div>
                    </div>
                    <div class="ready-pack__mid">
                        <ul class="ready-pack__mid-list" data-list="1">
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/union.svg">
                                        <img src="../img/complect_obor/union.svg" alt="union">
                                    </picture>
                                </div>
                                <div class="text">Автоматизирует безопасность сценариями</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/photo.svg">
                                        <img src="../img/complect_obor/photo.svg" alt="photo">
                                    </picture>
                                </div>
                                <div class="text">Присылает анимированную серию фотографий</div>
                            </li>
                            <li>
                                <div class="img">
                                    <picture>
                                        <source srcset="../img/complect_obor/wi-fi.svg">
                                        <img src="../img/complect_obor/wi-fi.svg" alt="wi-fi">
                                    </picture>
                                </div>
                                <div class="text">Всегда онлайн благодаря трем каналам связи</div>
                            </li>
                        </ul>

                        <div class="ready-pack__switch">
                            <div class="ready-pack__open">Развернуть
                                <svg width="8" height="5" viewBox="0 0 8 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.60396 4.82011L0.164193 1.04856C-0.0547314 0.808645 -0.0547314 0.419663 0.164193 0.179864C0.382921 -0.059955 0.737679 -0.059955 0.95639 0.179864L4.00006 3.5171L7.04362 0.179961C7.26244 -0.0598577 7.61716 -0.0598576 7.83589 0.179961C8.0547 0.41978 8.0547 0.808743 7.83589 1.04866L4.39607 4.8202C4.28665 4.94011 4.1434 5 4.00007 5C3.85668 5 3.71332 4.94 3.60396 4.82011Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>

                            <div class="ready-pack__close">Свернуть
                                <svg width="9" height="5" viewBox="0 0 9 5" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4.89604 0.179893L8.33581 3.95144C8.55473 4.19135 8.55473 4.58034 8.33581 4.82014C8.11708 5.05995 7.76232 5.05995 7.54361 4.82014L4.49994 1.4829L1.45638 4.82004C1.23756 5.05986 0.882842 5.05986 0.664113 4.82004C0.445296 4.58022 0.445296 4.19126 0.664113 3.95134L4.10393 0.179796C4.21335 0.059887 4.3566 4.59895e-08 4.49992 4.76986e-08C4.64332 4.94086e-08 4.78668 0.0600033 4.89604 0.179893Z"
                                          fill="#A0A0A0"/>
                                </svg>

                            </div>
                        </div>

                        <div class="predloj__present">
                            <div class="present__text">
                                <div class="h5">В подарок:</div>
                                <ul>
                                    <li><span>&#10003;</span> 1 мес. охранных услуг</li>
                                    <li><span>&#10003;</span> страховка</li>
                                    <li><span>&#10003;</span> доставка</li>
                                    <li><span>&#10003;</span> монтаж</li>
                                </ul>
                            </div>
                            <picture>
                                <source type="image/svg" srcset="../img/ready-des/pic.svg">
                                <img src="../img/ready-des/pic.svg" alt="img" loading="lazy">
                            </picture>
                        </div>
                    </div>

                    <div class="ready-pack__bottom">
                        <div class="ready-pack__bottom-left">
                            <div class="ready-pack__bottom-all">
                                Всего
                            </div>

                            <div class="ready-pack__bottom-result">
                                20 000 ₽

                                <span class="ready-pack__bottom-or">
                                    или
                                </span>
                            </div>
                        </div>

                        <div class="ready-pack__bottom-right">
                            <div class="solutions__bottom_column">

                                <div class="solutions__bottom_column-interest">
                                    <p>все проценты<br>
                                        за вас платит <span class="blue-vinco">vincko:</span>
                                    </p>
                                </div>
                                <div class="solutions__bottom_column-monthprice">
                                    <select name="solutions__bottom_column-select"
                                            class="solutions__bottom_column-select">
                                        <option selected value="12">12 мес.</option>
                                        <option value="6">6 мес.</option>
                                    </select>
                                    <p>по</p>
                                    <div class="solutions__bottom_column-price">
                                        1 000 ₽
                                    </div>
                                </div>

                            </div>
                        </div>

                        <button class="ready-pack__bottom-button button yellow-button">
                            ПОДРОБНЕЕ
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="subscribe subscribe__bought" id="subscribe">
        <div class="subscribe__head">
            <h2 class="h2">Подписка <span>vincko: <br>
            “Замена оборудования”</span>
            </h2>


        </div>

        <div class="subscribe__content">
            <div class="subscribe__column">
                <div class="subscribe__sub-title">
                    <svg width="33" height="33" viewBox="0 0 33 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16.5 0.25C7.53 0.25 0.25 7.53 0.25 16.5C0.25 25.47 7.53 32.75 16.5 32.75C25.47 32.75 32.75 25.47 32.75 16.5C32.75 7.53 25.47 0.25 16.5 0.25ZM17.9788 26.4937C17.8652 26.6051 17.7214 26.6807 17.5653 26.7111C17.4092 26.7415 17.2476 26.7254 17.1006 26.6649C16.9535 26.6043 16.8274 26.5019 16.738 26.3704C16.6486 26.2389 16.5997 26.084 16.5975 25.925V24.625H16.5C14.42 24.625 12.34 23.8288 10.7475 22.2525C9.64417 21.1465 8.88272 19.7461 8.55421 18.2188C8.22569 16.6915 8.344 15.1019 8.895 13.64C9.20375 12.8112 10.2925 12.6 10.91 13.2337C11.2675 13.5912 11.3487 14.1113 11.1862 14.5663C10.4387 16.5813 10.8612 18.9212 12.4862 20.5462C13.6237 21.6838 15.1187 22.22 16.6138 22.1875V20.66C16.6138 19.9288 17.4913 19.5713 17.995 20.0912L20.6275 22.7237C20.9525 23.0487 20.9525 23.5525 20.6275 23.8775L17.9788 26.4937ZM22.09 19.7825C21.922 19.6096 21.8068 19.3925 21.7579 19.1565C21.709 18.9205 21.7283 18.6754 21.8138 18.45C22.5613 16.435 22.1388 14.095 20.5138 12.47C19.3763 11.3325 17.8812 10.78 16.4025 10.8125V12.34C16.4025 13.0712 15.525 13.4288 15.0212 12.9087L12.3725 10.2925C12.0475 9.9675 12.0475 9.46375 12.3725 9.13875L15.005 6.50625C15.1186 6.3949 15.2623 6.31934 15.4184 6.28891C15.5745 6.25849 15.7361 6.27456 15.8832 6.33511C16.0303 6.39567 16.1563 6.49805 16.2457 6.62958C16.3352 6.7611 16.384 6.91597 16.3862 7.075V8.39125C18.4988 8.35875 20.6275 9.1225 22.2362 10.7475C23.3396 11.8535 24.101 13.2539 24.4295 14.7812C24.7581 16.3085 24.6397 17.8981 24.0888 19.36C23.78 20.205 22.7075 20.4163 22.09 19.7825Z"
                              fill="#3CBA54"/>
                    </svg>

                    Что такое подписка “Замена оборудования”

                </div>

                <p>
                    Подписка дает вам возможность бесплатно получить новый датчик для комплекта оборудования, купленного
                    на платформе в рамках готового решения.
                </p>
            </div>

            <div class="subscribe__column">
                <div class="subscribe__sub-title">
                    Почему эта подписка дает уверенность при покупке оборудования
                </div>

                <p>
                    В случае, если один из датчиков в комплекте вышел из строя, с этой подпиской Вы просто получите
                    новый взамен, а ваша недвижимость останется под надежной охраной.
                </p>
            </div>

            <div class="subscribe__column subscribe__column-to-buy">
                <div class="subscribe__sub-title">
                    На какой срок оформить подписку?
                </div>
                <div class="subscribe__column-to-buy-content">
                    <div class="subscribe__conditions">
                        <p>
                            Длительность гарантии
                        </p>
                        <select name="time-choice" id="time-choice" class="time-choice">
                            <option value="12">12 месяцев</option>
                            <option value="6">6 месяцев</option>
                        </select>

                        <div class="subscribe__text">
                            Спокойствия и уверенности
                        </div>

                        <div class="subscribe__result">
                            Всего за
                            <div class="price">
                                600 ₽
                            </div>
                        </div>

                    </div>

                    <button class="blue-button">Купить</button>

                </div>
            </div>

            <div class="subscribe__column subscribe__column-bought">
                <div class="subscribe__column-bought-head">
                <span>
                    Поздравляем!
                </span>

                    <svg width="50" height="37" viewBox="0 0 50 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M1.02433 17.998C2.38976 16.6592 4.60355 16.6592 5.96898 17.998L16.0099 28.7236L44.0313 1.00409C45.3967 -0.334696 47.6105 -0.334696 48.9759 1.00409C50.3414 2.34288 50.3414 4.51348 48.9759 5.85227L18.4822 35.9959C17.1168 37.3347 14.903 37.3347 13.5376 35.9959L1.02433 22.8462C-0.341092 21.5074 -0.341093 19.3368 1.02433 17.998Z"
                              fill="white"/>
                    </svg>

                </div>
                <div class="subscribe__column-bought-content">
                    <p>
                        Ранее Вы уже получили подписку “Замена Оборудования”.
                    </p>
                    <p>
                        Она будет действительна до 16.05.2021.
                    </p>
                    <p>
                        У Вас возникли вопросы? Свяжитесь с нами.
                    </p>
                </div>
            </div>

        </div>

    </section>
</main>
