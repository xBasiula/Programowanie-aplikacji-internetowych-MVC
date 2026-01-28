# Task Tracker - Dokumentacja w Języku Polskim

## 📋 Spis treści
1. [Wprowadzenie](#wprowadzenie)
2. [Wymagania](#wymagania)
3. [Instalacja](#instalacja)
4. [Funkcje aplikacji](#funkcje-aplikacji)
5. [Obsługa aplikacji](#obsługa-aplikacji)
6. [Sortowanie zadań](#sortowanie-zadań)
7. [Tryb ciemny](#tryb-ciemny)
8. [Struktura projektu](#struktura-projektu)
9. [Rozwiązywanie problemów](#rozwiązywanie-problemów)

---

## 🎯 Wprowadzenie

Task Tracker to prosta i elegancka aplikacja do zarządzania zadaniami, zbudowana w Laravel 12 i Bootstrap 5. Aplikacja pozwala na tworzenie, edycję, usuwanie oraz sortowanie zadań z kolorowymi oznaczeniami statusu.

### Główne funkcje:
- ✅ Pełna funkcjonalność CRUD (tworzenie, odczyt, aktualizacja, usuwanie)
- 🎨 Kolorowe ramki kart według statusu zadania
- 🌙 Przełącznik trybu jasnego/ciemnego
- 📊 Sortowanie zadań według 5 kryteriów
- 🎯 Trzy poziomy priorytetu
- 📅 Zarządzanie terminami wykonania

---

## 💻 Wymagania

Przed instalacją upewnij się, że masz zainstalowane:
- PHP 8.2 lub nowszy
- Composer
- Node.js i NPM
- SQLite (lub MySQL/PostgreSQL)
- Laravel 12

---

## 🚀 Instalacja

### Krok 1: Skopiuj pliki kontrolera
```bash
cp TaskController_with_sort.php app/Http/Controllers/TaskController.php
```

### Krok 2: Skopiuj widok index
```bash
cp index_with_sorting.blade.php resources/views/tasks/index.blade.php
```

### Krok 3: Skopiuj CSS i JS (jeśli jeszcze nie zrobiłeś)
```bash
cp app.css resources/css/app.css
cp app.js resources/js/app.js
```

### Krok 4: Wyczyść cache
```bash
php artisan view:clear
php artisan cache:clear
```

### Krok 5: Uruchom Vite
```bash
npm run dev
```

### Krok 6: Uruchom serwer Laravel (w nowym terminalu)
```bash
php artisan serve
```

### Krok 7: Otwórz w przeglądarce
```
http://localhost:8000
```

---

## 🎯 Funkcje aplikacji

### 1. Statusy zadań
Każde zadanie może mieć jeden z trzech statusów:

| Status | Polski | Kolor ramki | Kolor odznaki |
|--------|--------|-------------|---------------|
| `todo` | Do zrobienia | Szary (#6c757d) | Szary |
| `in_progress` | W trakcie | Żółty (#ffc107) | Żółty |
| `done` | Wykonane | Zielony (#198754) | Zielony |

### 2. Priorytety
Trzy poziomy priorytetu zadań:

| Priorytet | Polski | Kolor odznaki | Ikona |
|-----------|--------|---------------|-------|
| `high` | Wysoki | Czerwony | ⚠️ |
| `medium` | Średni | Niebieski | ➖ |
| `low` | Niski | Jasnoniebieski | ⬇️ |

### 3. Terminy wykonania
- Opcjonalne pole daty
- Wyświetlane w formacie: "Mie 28, 2026"
- Uwzględniane w sortowaniu

---

## 📖 Obsługa aplikacji

### Tworzenie nowego zadania

1. Kliknij przycisk **"Create New Task"** (Utwórz nowe zadanie) w prawym górnym rogu
2. Wypełnij formularz:
   - **Tytuł** (wymagane) - nazwa zadania
   - **Opis** (opcjonalne) - szczegółowy opis zadania
   - **Status** (wymagane) - wybierz: Do zrobienia / W trakcie / Wykonane
   - **Priorytet** (wymagane) - wybierz: Niski / Średni / Wysoki
   - **Termin** (opcjonalne) - data wykonania zadania
3. Kliknij **"Create Task"** (Utwórz zadanie)

### Przeglądanie zadania

1. Na liście zadań kliknij przycisk **"View"** (Zobacz) na karcie zadania
2. Zobaczysz szczegółowe informacje:
   - Pełny tytuł i opis
   - Status i priorytet
   - Termin wykonania (jeśli jest ustawiony)
   - Data utworzenia
   - Data ostatniej aktualizacji

### Edycja zadania

1. Kliknij przycisk **"Edit"** (Edytuj) na karcie zadania
2. Zmodyfikuj potrzebne pola
3. Kliknij **"Update Task"** (Aktualizuj zadanie)

### Usuwanie zadania

1. Kliknij przycisk **"Delete"** (Usuń) na karcie zadania
2. Potwierdź usunięcie w oknie dialogowym

---

## 🔄 Sortowanie zadań

Aplikacja oferuje zaawansowane sortowanie zadań według 5 kryteriów.

### Dostępne opcje sortowania:

#### 1. **Status** 🔵
Sortuje zadania według statusu:
- Rosnąco: Do zrobienia → W trakcie → Wykonane
- Malejąco: Wykonane → W trakcie → Do zrobienia

**Przykład użycia:** Pokaż najpierw wszystkie zadania do wykonania

#### 2. **Priorytet** ⚠️
Sortuje według ważności:
- Rosnąco: Wysoki → Średni → Niski
- Malejąco: Niski → Średni → Wysoki

**Przykład użycia:** Zobacz najpilniejsze zadania na początku listy

#### 3. **Termin wykonania** 📅
Sortuje według daty zakończenia:
- Rosnąco: Najwcześniejsze daty → Najpóźniejsze daty
- Malejąco: Najpóźniejsze daty → Najwcześniejsze daty

**Uwaga:** Zadania bez terminu będą na końcu listy

#### 4. **Tytuł** 🔤
Sortuje alfabetycznie według nazwy:
- Rosnąco: A → Z
- Malejąco: Z → A

**Przykład użycia:** Znajdź zadanie po nazwie

#### 5. **Data utworzenia** 🕐
Sortuje według daty dodania:
- Rosnąco: Najstarsze → Najnowsze
- Malejąco: Najnowsze → Najstarsze (domyślne)

### Jak korzystać z sortowania:

1. **Znajdź panel sortowania** nad kartami zadań (sekcja "Sort by:")
2. **Kliknij przycisk** z wybranym kryterium sortowania
3. **Pierwsze kliknięcie** - sortowanie rosnące (strzałka w górę ⬆️)
4. **Drugie kliknięcie** - sortowanie malejące (strzałka w dół ⬇️)
5. **Aktywny filtr** jest wyróżniony niebieskim kolorem
6. **Przycisk "Reset"** - wraca do domyślnego sortowania (najnowsze na początku)

### Przykłady zastosowania:

**Scenariusz 1: Chcę zobaczyć zadania wymagające uwagi**
1. Kliknij przycisk "Status"
2. Zadania "Do zrobienia" i "W trakcie" będą na początku

**Scenariusz 2: Chcę pracować nad najpilniejszymi zadaniami**
1. Kliknij przycisk "Priority"
2. Zadania o wysokim priorytecie będą na górze listy

**Scenariusz 3: Chcę zobaczyć co jest do zrobienia najpierw**
1. Kliknij przycisk "Due Date"
2. Zadania z najbliższym terminem będą pierwsze

---

## 🌙 Tryb ciemny

### Włączanie/wyłączanie

1. **Znajdź ikonę księżyca** 🌙 w prawym górnym rogu nawigacji
2. **Kliknij ikonę** aby przełączyć tryb:
   - Jasny tryb: ikona księżyca 🌙
   - Ciemny tryb: ikona słońca ☀️
3. **Preferencja jest zapisywana** - aplikacja zapamięta Twój wybór

### Różnice w trybie ciemnym:

| Element | Tryb jasny | Tryb ciemny |
|---------|-----------|-------------|
| Tło strony | Jasny szary | Ciemny szary |
| Karty zadań | Białe | Ciemnoszare |
| Tekst | Czarny | Biały |
| Ramki statusu | Wyraźne | Wyraźne (bez zmian) |

### Zalety trybu ciemnego:
- 👁️ Mniej męczące dla oczu
- 🔋 Oszczędność baterii (na ekranach OLED)
- 🌃 Wygodniejsze w ciemnym pomieszczeniu
- ✨ Nowoczesny wygląd

---

## 📁 Struktura projektu

```
app/
├── Http/
│   └── Controllers/
│       └── TaskController.php    ← Kontroler z logiką sortowania
└── Models/
    └── Task.php                  ← Model zadania

resources/
├── css/
│   └── app.css                   ← Style CSS (tryb ciemny, ramki)
├── js/
│   └── app.js                    ← JavaScript (przełącznik trybu)
└── views/
    ├── layouts/
    │   └── app.blade.php         ← Główny layout
    └── tasks/
        ├── index.blade.php       ← Lista z sortowaniem
        ├── create.blade.php      ← Formularz tworzenia
        ├── edit.blade.php        ← Formularz edycji
        └── show.blade.php        ← Szczegóły zadania

database/
└── migrations/
    └── 2026_01_28_143200_create_tasks_table.php
```

---

## 🔧 Rozwiązywanie problemów

### Problem: Sortowanie nie działa

**Rozwiązanie:**
```bash
# Upewnij się, że skopiowałeś nowy kontroler
cp TaskController_with_sort.php app/Http/Controllers/TaskController.php

# Wyczyść cache
php artisan cache:clear
php artisan view:clear

# Twardy restart przeglądarki (Ctrl+Shift+R)
```

### Problem: Ramki zadań są wszystkie szare

**Rozwiązanie:**
```bash
# Skopiuj poprawiony plik CSS
cp app.css resources/css/app.css

# Upewnij się że Vite działa
npm run dev

# Twardy restart przeglądarki (Ctrl+Shift+R lub Cmd+Shift+R)
```

### Problem: Tryb ciemny nie działa

**Rozwiązanie:**
```bash
# Sprawdź czy plik JS jest skopiowany
ls -la resources/js/app.js

# Jeśli nie ma - skopiuj
cp app.js resources/js/app.js

# Sprawdź konsolę przeglądarki (F12) czy są błędy
```

### Problem: Błąd "Vite manifest not found"

**Rozwiązanie:**
```bash
# Upewnij się że Vite jest uruchomiony
npm run dev

# Jeśli problem nadal występuje
npm install
npm run dev
```

### Problem: Zadania nie zapisują się do bazy

**Rozwiązanie:**
```bash
# Sprawdź czy migracja została uruchomiona
php artisan migrate:status

# Jeśli nie - uruchom migrację
php artisan migrate

# Sprawdź uprawnienia do pliku bazy
chmod 664 database/database.sqlite
```

### Problem: Nie widzę przycisków sortowania

**Rozwiązanie:**
```bash
# Upewnij się że skopiowałeś nowy widok index
cp index_with_sorting.blade.php resources/views/tasks/index.blade.php

# Wyczyść cache widoków
php artisan view:clear

# Odśwież przeglądarkę
```

---

## 💡 Wskazówki i najlepsze praktyki

### Organizacja zadań

1. **Używaj priorytetów mądrze**
   - Wysoki: Pilne i ważne
   - Średni: Ważne ale nie pilne
   - Niski: Można zrobić później

2. **Aktualizuj statusy regularnie**
   - Rozpoczynając pracę: zmień na "W trakcie"
   - Po zakończeniu: zmień na "Wykonane"

3. **Ustaw terminy dla ważnych zadań**
   - Pomaga w planowaniu
   - Możesz sortować według terminów

4. **Używaj opisów dla złożonych zadań**
   - Notuj szczegóły
   - Dodaj linki lub odniesienia

### Efektywne sortowanie

**Poranek (Start dnia):**
1. Sortuj według "Priority" → zobacz co najważniejsze
2. Sprawdź "Due Date" → co ma termin dzisiaj

**W trakcie dnia:**
1. Sortuj według "Status" → skoncentruj się na "W trakcie"
2. Oznaczaj ukończone zadania

**Koniec dnia:**
1. Sortuj według "Status" → sprawdź wykonane zadania
2. Przygotuj plan na jutro

---

## 📊 Statystyki i monitoring

### Legenda statusów

Na dole listy zadań znajdziesz legendę kolorów:
- 🔘 **Do zrobienia** - Szara ramka
- 🔄 **W trakcie** - Żółta ramka  
- ✅ **Wykonane** - Zielona ramka

To pomaga szybko identyfikować zadania!

---

## 🎨 Personalizacja

### Zmiana kolorów ramek

Edytuj plik `resources/css/app.css`:

```css
/* Zadania do zrobienia - domyślnie szary */
.task-card-todo {
    border-color: #6c757d !important;
}

/* Zadania w trakcie - domyślnie żółty */
.task-card-in-progress {
    border-color: #ffc107 !important;
}

/* Zadania wykonane - domyślnie zielony */
.task-card-done {
    border-color: #198754 !important;
}
```

### Zmiana grubości ramki

```css
.card {
    border-width: 3px; /* Zmień na 2px, 4px, 5px itp. */
}
```

---

## 🚀 Dodatkowe funkcje (planowane)

Możliwe rozszerzenia aplikacji:
- 🔍 Wyszukiwanie zadań
- 🏷️ Tagi i kategorie
- 👥 Przypisywanie zadań do użytkowników
- 📧 Powiadomienia email
- 📱 Aplikacja mobilna
- 📈 Statystyki i wykresy
- 🔔 Przypomnienia o terminach

---

## 📞 Wsparcie

W razie problemów:
1. Sprawdź sekcję "Rozwiązywanie problemów"
2. Przejrzyj dokumentację Laravel: https://laravel.com/docs
3. Sprawdź dokumentację Bootstrap: https://getbootstrap.com/docs

---

## 📝 Changelog

### Wersja 1.2 (Aktualna)
- ✅ Dodano sortowanie według 5 kryteriów
- ✅ Poprawiono tryb ciemny dla ramek statusów
- ✅ Dodano wskaźniki kierunku sortowania
- ✅ Dodano przycisk resetowania sortowania

### Wersja 1.1
- ✅ Dodano tryb ciemny
- ✅ Dodano kolorowe ramki według statusu
- ✅ Ulepszone ikony i wizualizacja

### Wersja 1.0
- ✅ Podstawowa funkcjonalność CRUD
- ✅ Statusy i priorytety
- ✅ Terminy wykonania

---

## 📜 Licencja

Projekt open-source, dostępny do użytku edukacyjnego.

---

**Dziękuję za korzystanie z Task Tracker!** 🎉

Jeśli masz pytania lub sugestie, nie wahaj się dodać ich do projektu.
