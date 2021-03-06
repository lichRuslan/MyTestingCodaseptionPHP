<?php


class testCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }


    // tests add users list /users
    public function UpUser(AcceptanceTester $I)
    {
        $I-> amOnPage('/login');
        $I-> fillField('login', 't@t.t');
        $I-> fillField('password', '123');
        $I-> click('Войти');
        sleep(1);
        for ($q = 1; $q <= 3; $q++) {
            $I-> amOnPage('/users');
            $I-> see('Операторы');
            $I-> click('Добавить');
            $I-> see ('Номер телефона оператора');
            $I-> see ('Пароль');
            $I-> see ('Повтор пароля');
            $I-> see ('Группа');
            $I-> see ('Активный');
            $I-> fillField('Логин', $q);
            $I-> fillField('phone_operator', '123123');
            $I-> fillField('password', '123123');
            $I-> fillField('check_password', '123123');
            $I-> click('Создать');
            $I-> click('Отмена');
        }
        /*$I-> click('span.menu');
        $I-> click('span.remove-user-btn-text');*/
    }


    public function SeeDirectoryUsers(AcceptanceTester $I){
        sleep(1);
        $I-> amOnPage('/users');
        $I-> see('Операторы');

        $I-> click('select.group');
        $I-> see('Группа');
        $I-> see('Все');        
        $I-> see('Администратор');
        $I-> see('Оператор');
        $I-> click('Оператор');
        $I-> click('select.group');

        $I-> click('select.status');
        $I-> see('Статус');
        $I-> see('Все');
        $I-> see('Активный');
        $I-> see('Неактивный');
        $I-> click('select.status');

        $I-> see('Добавить');
        $I-> see('Телефон');
        $I-> see('Группа');
        $I-> see('Статус');
        $I-> see('Логин');
        $I-> see('Дата изменения');

        $I-> click('Добавить');
        $I-> see('Логин');
        $I-> see('Номер телефона оператора');
        $I-> see('Пароль');
        $I-> see('Повтор пароля');
        $I-> see('Группа');
        $I-> click('select#role.group');
        $I-> see('Администратор');
        $I-> see('Пользователь');
        $I-> click('select#role.group');
        $I-> see('Активный');
        $I-> click('input.toggle');
        $I-> see('Создать');
        $I-> see('Отмена');
        $I-> click('button.cancel-btn');
        $I-> amOnPage('/users');
        sleep(1);
    }

    


    public function RemoveUser(AcceptanceTester $I){
        $I-> amOnPage('/users');
        $I->click('div.item.row.flex-20.phone-wrapper');
        $I->click('span.dots-btn');
        $I->click('div#user-delete-btn.remove-item-btn-wrapper');
        sleep(1);
        $I->click('div.item.row.flex-20.phone-wrapper');
        $I->click('span.dots-btn');
        $I->click('div#user-delete-btn.remove-item-btn-wrapper');
        sleep(1);
        $I->click('div.item.row.flex-20.phone-wrapper');
        $I->click('span.dots-btn');
        $I->click('div#user-delete-btn.remove-item-btn-wrapper');
    }
    public function RedactionUser(AcceptanceTester $I){
        sleep(1);
        $I->click('div.item.row.flex-20.phone-wrapper');
        $I-> see('Номер телефона оператора');
        $I-> fillField('phone_operator', 'номер изменён');
        $I-> see('Пароль');
        $I-> fillField('password', '123qweasdzxc');
        $I-> see('Повтор пароля');
        $I-> fillField('check_password', '123qweasdzxc');
        $I-> see('Группа');
        $I-> click('select#role.group');
        $I-> click('option.admin');
        $I-> click('input.toggle');
        sleep(1);
        $I-> click('Редактировать');
        $I-> see('номер изменён');
        sleep(1);
        
        $I->click('div.item.row.flex-20.phone-wrapper');
        $I-> see('Номер телефона оператора');
        $I-> fillField('phone_operator', '123');
        $I-> see('Пароль');
        $I-> fillField('password', '123');
        $I-> see('Повтор пароля');
        $I-> fillField('check_password', '123');
        $I-> see('Группа');
        $I-> click('select#role.group');
        $I-> click('option.user');
        $I-> click('input.toggle');
        sleep(1);
        $I-> click('Редактировать');
        $I-> see('номер изменён');
        sleep(1);
    }

    public function filter (AcceptanceTester $I){
        sleep(1);
        $I-> amOnPage('/users');


        $I->selectOption('select.group','Администратор');
        sleep(2);
        $I->selectOption('select.status','Активный');
        sleep(1);

        $I->selectOption('select.group','Администратор');
        sleep(2);
        $I->selectOption('select.status','Неактивный');
        sleep(1);
        
        $I->selectOption('select.group','Оператор');
        sleep(2);
        $I->selectOption('select.status','Активный');
        sleep(1);

        $I->selectOption('select.group','Оператор');
        sleep(2);
        $I->selectOption('select.status','Неактивный');
        sleep(1);
        
    }

}