<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'আবেগনীয় আবশ্যক।',
    'accepted_if' => ':other এর মান :value হলে :attribute ক্ষেত্রটি গ্রহণ করা আবশ্যক।',
    'active_url' => ':attribute ক্ষেত্রটি একটি বৈধ URL হতে হবে।',
    'after' => ':attribute ক্ষেত্রটি কেবলমাত্র :date এর পরের তারিখ হতে হবে।',
    'after_or_equal' => ':attribute ক্ষেত্রটি :date এর পরে অথবা সমান তারিখ হতে হবে।',
    'alpha' => ':attribute ক্ষেত্রটিতে কেবলমাত্র অক্ষর থাকতে হবে।',
    'alpha_dash' => ':attribute ক্ষেত্রটিতে কেবলমাত্র অক্ষর, সংখ্যা, ড্যাশ, এবং আন্ডারস্কোর থাকতে হবে।',
    'alpha_num' => ':attribute ক্ষেত্রটিতে কেবলমাত্র অক্ষর এবং সংখ্যা থাকতে হবে।',
    'array' => ':attribute ক্ষেত্রটি একটি অ্যারে হতে হবে।',
    'ascii' => ':attribute ক্ষেত্রটিতে কেবলমাত্র একটি সিঙ্গেল-বাইট বর্ণাক্ষর এবং চিহ্ন থাকতে হবে।',
    'before' => ':attribute ক্ষেত্রটি কেবলমাত্র :date এর আগের তারিখ হতে হবে।',
    'before_or_equal' => ':attribute ক্ষেত্রটি :date এর আগে অথবা সমান তারিখ হতে হবে।',
    'between' => [
        'array' => ':attribute ক্ষেত্রটি অবশ্যই :min এবং :max আইটেম অধিক থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :min এবং :max কিলোবাইটের মধ্যে হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :min এবং :max মধ্যে হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :min এবং :max টি অক্ষরের মধ্যে হতে হবে।',
    ],
    'boolean' => ':attribute ক্ষেত্রটি সত্য বা মিথ্যা হতে হবে।',
    'can' => ':attribute ক্ষেত্রটি অননুমোদিত মান সম্পন্ন।',
    'confirmed' => ':attribute ক্ষেত্রটির নিশ্চিতকরণ মেলে না।',
    'current_password' => 'পাসওয়ার্ডটি ভুল।',
    'date' => ':attribute ক্ষেত্রটি একটি বৈধ তারিখ হতে হবে।',
    'date_equals' => ':attribute ক্ষেত্রটি সমান তারিখ :date হতে হবে।',
    'date_format' => ':attribute ক্ষেত্রটি ফরম্যাটে মেলে না :format।',
    'decimal' => ':attribute ক্ষেত্রটি :decimal দশমিক স্থান থাকতে হবে।',
    'declined' => ':attribute ক্ষেত্রটি প্রত্যাখ্যান করা আবশ্যক।',
    'declined_if' => ':other মান :value হলে :attribute ক্ষেত্রটি প্রত্যাখ্যান করা আবশ্যক।',
    'different' => ':attribute ক্ষেত্রটি এবং :other কে আলাদা হতে হবে।',
    'digits' => ':attribute ক্ষেত্রটি হতে হবে :digits সংখ্যা।',
    'digits_between' => ':attribute ক্ষেত্রটি হতে হবে :min এবং :max সংখ্যা মধ্যে।',
    'dimensions' => ':attribute ক্ষেত্রটির ইমেজ মৌলিক মাপ অবৈধ।',
    'distinct' => ':attribute ক্ষেত্রটির একটি ডুপ্লিকেট মান রয়েছে।',
    'doesnt_end_with' => ':attribute ক্ষেত্রটি নিম্নলিখিত মধ্যে কোনটিতে শেষ হতে পারে না :values।',
    'doesnt_start_with' => ':attribute ক্ষেত্রটি নিম্নলিখিত মধ্যে কোনটিতে শুরু হতে পারে না :values।',
    'email' => ':attribute ক্ষেত্রটি একটি বৈধ ইমেইল ঠিকানা হতে হবে।',
    'ends_with' => ':attribute ক্ষেত্রটি নিম্নলিখিত মধ্যে কোনটিতে শেষ হতে হবে :values।',
    'enum' => 'নির্বাচিত :attribute অবৈধ।',
    'exists' => 'নির্বাচিত :attribute অবৈধ।',
    'file' => ':attribute ক্ষেত্রটি একটি ফাইল হতে হবে।',
    'filled' => ':attribute ক্ষেত্রটি মান থাকতে হবে।',
    'gt' => [
        'array' => ':attribute ক্ষেত্রটির অবশ্যই :value আইটেম এর অধিক থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের অধিক হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর অধিক হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value টি অক্ষরের অধিক হতে হবে।',
    ],
    'gte' => [
        'array' => ':attribute ক্ষেত্রটির অবশ্যই :value আইটেম অথবা তারও বেশি থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের অধিক অথবা সমান হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value অথবা সমান হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অথবা সমান অক্ষরের হতে হবে।',
    ],
    'image' => ':attribute ক্ষেত্রটি একটি চিত্র হতে হবে।',
    'in' => 'নির্বাচিত :attribute অবৈধ।',
    'in_array' => ':attribute ক্ষেত্রটি :other এর মধ্যে থাকতে হবে।',
    'integer' => ':attribute ক্ষেত্রটি একটি পূর্ণাংক হতে হবে।',
    'ip' => ':attribute ক্ষেত্রটি একটি বৈধ আইপি ঠিকানা হতে হবে।',
    'ipv4' => ':attribute ক্ষেত্রটি একটি বৈধ IPv4 ঠিকানা হতে হবে।',
    'ipv6' => ':attribute ক্ষেত্রটি একটি বৈধ IPv6 ঠিকানা হতে হবে।',
    'json' => ':attribute ক্ষেত্রটি একটি বৈধ JSON স্ট্রিং হতে হবে।',
    'lowercase' => ':attribute ক্ষেত্রটি ক্ষুদ্রবর্ণে হতে হবে।',
    'lt' => [
        'array' => ':attribute ক্ষেত্রটির অবশ্যই :value আইটেম এর কম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের কম হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value এর কম হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value টি অক্ষরের কম হতে হবে।',
    ],
    'lte' => [
        'array' => ':attribute ক্ষেত্রটির অবশ্যই :value আইটেম এর বেশি থাকতে পারে না।',
        'file' => ':attribute ক্ষেত্রটি :value কিলোবাইটের অধিক অথবা সমান হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :value অথবা সমান হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :value অথবা সমান অক্ষরের হতে হবে।',
    ],
    'mac_address' => ':attribute ক্ষেত্রটি একটি বৈধ ম্যাক ঠিকানা হতে হবে।',
    'max' => [
        'array' => ':attribute ক্ষেত্রটি অবশ্যই :max আইটেম এর কম থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি :max কিলোবাইটের কম হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি :max এর কম হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি :max টি অক্ষরের কম হতে হবে।',
    ],
    'max_digits' => ':attribute ক্ষেত্রটি অবশ্যই :max সংখ্যা এর কম থাকতে হবে।',
    'mimes' => ':attribute ক্ষেত্রটি একটি :values ধরনের ফাইল হতে হবে।',
    'mimetypes' => ':attribute ক্ষেত্রটি একটি :values ধরনের ফাইল হতে হবে।',
    'min' => [
        'array' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত :min আইটেম এর মধ্যে থাকতে হবে।',
        'file' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত :min কিলোবাইটের হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত :min হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত :min অক্ষরের হতে হবে।',
    ],
    'min_digits' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত :min সংখ্যা এর মধ্যে থাকতে হবে।',
    'missing' => ':attribute ক্ষেত্রটি অনুপস্থিত হতে হবে।',
    'missing_if' => ':other মান :value হলে :attribute ক্ষেত্রটি অনুপস্থিত হতে হবে।',
    'missing_unless' => ':other মান :value না হলে :attribute ক্ষেত্রটি অনুপস্থিত হতে হবে।',
    'missing_with' => ':values উপস্থিত হলে :attribute ক্ষেত্রটি অনুপস্থিত হতে হবে।',
    'missing_with_all' => ':values উপস্থিত হলে :attribute ক্ষেত্রটি অনুপস্থিত হতে হবে।',
    'multiple_of' => ':attribute ক্ষেত্রটি :value এর একটি গুণিতক হতে হবে।',
    'not_in' => 'নির্বাচিত :attribute অবৈধ।',
    'not_regex' => ':attribute ক্ষেত্রটির ফরম্যাট অবৈধ।',
    'numeric' => ':attribute ক্ষেত্রটি একটি সংখ্যা হতে হবে।',
    'password' => [
        'letters' => ':attribute ক্ষেত্রটি অবশ্যই অন্তত একটি অক্ষর থাকতে হবে।',
        'mixed' => ':attribute ক্ষেত্রটি অবশ্যই একটি বড় হাতের এবং একটি ছোট হাতের অক্ষর থাকতে হবে।',
        'numbers' => ':attribute ক্ষেত্রটি অবশ্যই একটি সংখ্যা থাকতে হবে।',
        'symbols' => ':attribute ক্ষেত্রটি অবশ্যই একটি চিহ্ন থাকতে হবে।',
        'uncompromised' => 'দেওয়া :attribute একটি ডেটা লিকে প্রকাশিত হয়েছে। দয়া করে একটি আলাদা :attribute চয়ন করুন।',
    ],
    'present' => ':attribute ক্ষেত্রটি উপস্থিত হতে হবে।',
    'prohibited' => ':attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibited_if' => ':other মান :value হলে :attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibited_unless' => ':other মান :values এর মধ্যে না থাকলে :attribute ক্ষেত্রটি নিষিদ্ধ।',
    'prohibits' => ':attribute ক্ষেত্রটি :other একটি উপস্থিতি থাকলে :other একটি নিষিদ্ধ করে।',
    'regex' => ':attribute ক্ষেত্রটির ফরম্যাট অবৈধ।',
    'required' => ':attribute ক্ষেত্রটি প্রয়োজন।',
    'required_array_keys' => ':attribute ক্ষেত্রটি অনুপস্থিত মানগুলির জন্য একটি এন্ট্রি থাকতে হবে :values।',
    'required_if' => ':other মান :value হলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_if_accepted' => ':other মান গ্রহণ করা হলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_unless' => ':other মান :values এর মধ্যে না থাকলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_with' => ':values উপস্থিত হলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_with_all' => ':values উপস্থিত হলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_without' => ':values উপস্থিত না হলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'required_without_all' => 'নির্দিষ্ট :values মধ্যে কোনটি উপস্থিত না থাকলে :attribute ক্ষেত্রটি প্রয়োজন।',
    'same' => ':attribute ক্ষেত্রটি :other এর সাথে মেলানো হতে হবে।',
    'size' => [
        'array' => ':attribute ক্ষেত্রটি অবশ্যই :size আইটেম এর সমান হতে হবে।',
        'file' => ':attribute ক্ষেত্রটি অবশ্যই :size কিলোবাইটের সমান হতে হবে।',
        'numeric' => ':attribute ক্ষেত্রটি অবশ্যই :size এর সমান হতে হবে।',
        'string' => ':attribute ক্ষেত্রটি অবশ্যই :size অক্ষরের সমান হতে হবে।',
    ],
    'starts_with' => ':attribute ক্ষেত্রটি নিম্নলিখিত মধ্যে কোনটিতে শুরু হতে হবে :values।',
    'string' => ':attribute ক্ষেত্রটি একটি স্ট্রিং হতে হবে।',
    'timezone' => ':attribute ক্ষেত্রটি একটি বৈধ টাইমজোন হতে হবে।',
    'unique' => ':attribute ইতিমধ্যে নেওয়া হয়েছে।',
    'uploaded' => ':attribute আপলোড করতে ব্যর্থ হয়েছে।',
    'uppercase' => ':attribute ক্ষেত্রটি মাধ্যমিক হতে হবে।',
    'url' => ':attribute ক্ষেত্রটি একটি বৈধ URL হতে হবে।',
    'ulid' => ':attribute ক্ষেত্রটি একটি বৈধ ULID হতে হবে।',
    'uuid' => ':attribute ক্ষেত্রটি একটি বৈধ UUID হতে হবে।',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];