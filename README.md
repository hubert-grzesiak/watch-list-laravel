# Laravel Livewire

Projekt prezentujący przykład aplikacji napisanej z użyciem następującego stosu technologicznego:
- Laravel 10,
- Laravel Jetstream 3,
- LiveWire 2,
- LaravelViews 2.

**UWAGA:** Wykorzystana wersja pakietu Laravel Jetstream korzysta z LiveWire 3, który nie jest w pełni kompatybilny z przedstawionymi w tym projekcie przykładami!

# Jak uruchomić projekt

## Odtworzenie katalogu `vendor`
W katalogu projektu należy uruchomić z linii komend skrypt  (skrypt musi posiadać uprawnienia do wykonywania `chmod 755`) wykonując polecenie:

    ./laravel_install_vendor.sh

## Plik konfiguracyjny env.ini
W przypadku nie korzystania z Docker'a, plik konfiguracyjny aplikacji o nazwie `env.ini` należy stosownie zmodyfikować.

## Uruchomienie kontenerów
Z katalogu głównego aplikacji należy wykonać polecenie:

    sail up -d        

Na podstawie pliku konfiguracyjnego `docker-compose.yml` zostaną uruchomione cztery kontenery:

- kontener aplikacji (nasłuchujący na porcie `:80`),
- kontener bazy danych (nasłuchujący na porcie `:3306`),
- kontener aplikacji `phpmyadmin` (nasłuchujący na porcie `:8081`),
- kontener klienta poczty `mailpit` (nasłuchujący na porcie `:8025`).

## Wygenerowanie klucza aplikacji
Przed użyciem narzędzia szyfrującego Laravel musisz ustawić konfigurację klucza w pliku konfiguracyjnym `config/app.php`. Ta wartość konfiguracyjna jest ustawiana na podstawie zmiennej środowiskowej `APP_KEY`. Aby ją ustawić należy wykonać polecenie:

     sail artisan key:generate

## Podlinkowanie publicznego folderu `storage`
Katalog `storage/app/public` może służyć do przechowywania plików, które powinny być publicznie dostępne (np. obrazy, pliki CSS lub JS). Należy utworzyć dowiązanie symboliczne w katalogu `public/storage`, które będzie wskazywało ten katalog. Aby to zrobić należy wykonać polecenie:

    sail artisan storage:link

## Odtworzenie katalogu `node_modules`
Katalog pakietów JavaScript można odtworzyć z użyciem menadżera pakietów dla języka JavaScript - `npm`. Pakiety zdefiniowane w pliku `package.json` należy pobrać poleceniem

    sail npm install

## Odtworzenie bazy danych
Bazę danych można stworzyć i wypełnić przykładowymi danymi wykonując polecenie:

    sail artisan migrate:fresh --seed

## Uruchomienie narzędzia do budowy plików JS i CSS 
Projekt wykorzystuje narzędzie do budowy plików JS i CSS. Uruchomione w trybie deweloperskim, pozwala na bieżąco śledzić zmiany w tego typu plikach w katalogu `resources` i udostępniać aplikacji zbudowane paczki. Narzędzie uruchamiamy poleceniem:

    sail npm run dev

**UWAGA:** Nie można zamknąć konsoli!

## Praca z kontenerami

### Uruchomienie kontenerów
    sail up -d

### Zatrzymanie kontenerów
    sail down

### Zatrzymanie kontenerów wraz z usunięciem wolumenów
    sail down -v

**UWAGA:** Spowoduje to usunięcie bazy danych!

## Logowanie do aplikacji
Aplikacja, poza przykładowymi kontami użytkowników, posiada trzy konta testowe:

- admin.test@localhost,
- worker.test@localhost,
- user.test@localhost.

Każde konto ma ustawione hasło `12345678`.