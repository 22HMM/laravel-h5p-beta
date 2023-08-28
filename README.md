# H5P Plugin for Laravel Framework

# Download Library File from here 
https://h5p.org/sites/default/files/h5p/exports/interactive-video-2-618.h5p

``
        $libs = [
            "example-content-arts-of-europe-443085.h5p",
            "advanced-blanks-example-1-503253.h5p",
            "course-presentation-21-21180.h5p",
            "interactive-video-2-618.h5p",
            "example-content-virtual-tour-360-441814.h5p",
            "true-false-question-34806.h5p",
            "timeline-3-716.h5p",
            "summary-714.h5p",
            "speak-the-words-set-example-120784.h5p",
            "speak-the-words-73595.h5p",
            "example-content-single-choice-set-64682.h5p",
            "question-set-616.h5p",
            "questionnaire-4-30615.h5p",
            "personality-quiz-21254.h5p",
            "multiple-choice-713.h5p",
            "memory-game-5-708.h5p",
            "mark-the-words-2-1408.h5p",
            "contact-18-1022298.h5p",
            "berries-28-441940.h5p",
            "impressive-presentation-7141.h5p",
            "image-slider-2-130336.h5p",
            "image-sequencing-3-110117.h5p",
            "example-content-image-pairing-2-233382.h5p",
            "image-juxtaposition-65047.h5p",
            "image-hotspots-2-825.h5p",
            "iframe-embedder-621.h5p",
            "image-multiple-hotspot-question-65081.h5p",
            "find-the-hotspot-3024.h5p",
            "example-content-find-the-words-557697.h5p",
            "flashcards-51-111820.h5p",
            "guess-the-answer-2402.h5p",
            "fill-in-the-blanks-837.h5p",
            "essay-4-166755.h5p",
            "drag-the-words-1399.h5p",
            "drag-and-drop-712.h5p",
            "documentation-tool-3022.h5p",
            "chart-7143.h5p",
            "collage-3065.h5p",
            "h5p-column-34794.h5p",
            "dialog-cards-620.h5p",
            "dictation-389727.h5p",
            "audio-recorder-142-1214919.h5p",
            "example-content-crossword-1209160.h5p",
            "arithmetic-quiz-22-57860.h5p",
            "agamotto-80158.h5p",
            "advent-blue-snowman-1075566.h5p",
            "accordion-6-7138.h5p"
        ];
``

Require it in the Composer.

```bash
composer require hareom284/laravel-h5p
```

Publish the Views, Config and so things.

```bash
php artisan vendor:publish --provider="Hareom284\LaravelH5p\LaravelH5pServiceProvider"
```

Migrate the Database

```bash
php artisan migrate --package=vendor/hareom284/laravel-h5p
```

Add to Composer-Classmap:

```php
'classmap': [
    "vendor/h5p/h5p-core/h5p-default-storage.class.php",
    "vendor/h5p/h5p-core/h5p-development.class.php",
    "vendor/h5p/h5p-core/h5p-event-base.class.php",
    "vendor/h5p/h5p-core/h5p-file-storage.interface.php",
    "vendor/h5p/h5p-core/h5p.classes.php",
    "vendor/h5p/h5p-editor/h5peditor-ajax.class.php",
    "vendor/h5p/h5p-editor/h5peditor-ajax.interface.php",
    "vendor/h5p/h5p-editor/h5peditor-file.class.php",
    "vendor/h5p/h5p-editor/h5peditor-storage.interface.php",
    "vendor/h5p/h5p-editor/h5peditor.class.php"
],
```

```php
'providers' => [
    Hareom284\LaravelH5p\LaravelH5pServiceProvider::class,
];
```

Link files

```
cd public/assets/vendor/h5p
ln -s public/assets/vendor/h5p ../../../../storage/app/public/h5p/libraries
```

You probably will need to add it to your `app/Http/Middleware/VerifyCsrfToken.php` due to H5P ajax requests without Laravel CSRF token:

```php
protected $except = [
    //
    'admin/h5p/ajax',
    'admin/h5p/ajax/*'
];
```

## Credits
This package is forked from [Wells Escola LMS](https://github.com/EscolaSoft/Laravel-H5P) and modified some code. 
