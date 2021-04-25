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

    'accepted' => ':attribute đã được chấp nhận.',
    'active_url' => ':attribute không phải là URL hợp lệ.',
    'after' => ':attribute phải sau ngày :date.',
    'after_or_equal' => ':attribute phải sau ngày hoặc bằng :date.',
    'alpha' => ':attribute phải là các chữ cái.',
    'alpha_dash' => ':attribute phải là các chữ cái, số, dấu ngang và dấu gạch dưới.',
    'alpha_num' => ':attribute phải là các chữ cái và số.',
    'array' => ':attribute phải là mảng.',
    'before' => ':attribute phải trước ngày :date.',
    'before_or_equal' => ':attribute phải trước ngày hoặc bằng :date.',
    'between' => [
        'numeric' => ':attribute phải ở giữa :min and :max.',
        'file' => ':attribute phải ở giữa :min and :max kilobytes.',
        'string' => ':attribute phải ở giữa :min and :max characters.',
        'array' => ':attribute phải tồn tại giữa :min and :max items.',
    ],
    'boolean' => 'Trường :attribute phải là đúng hoặc sai.',
    'confirmed' => ':attribute xác nhận không chính xác.',
    'date' => ':attribute không phải ngày hợp lệ.',
    'date_equals' => ':attribute phải là ngày bằng :date.',
    'date_format' => ':attribute không đúng với định dạng :format.',
    'different' => ':attribute và :other phải khác nhau.',
    'digits' => ':attribute phải là :digits chữ số.',
    'digits_between' => ':attribute phải ở giữa :min and :max chữ số.',
    'dimensions' => ':attribute có kích thước ảnh không phù hợp.',
    'distinct' => 'Trường :attribute có dữ liệu trùng lặp.',
    'email' => ':attribute phải là địa chỉ email hợp lệ.',
    'ends_with' => ':attribute phải kết thúc bằng một trong những điều sau: :values.',
    'exists' => 'Lựa chọn :attribute đã tồn tại.',
    'file' => ':attribute phải là file.',
    'filled' => 'Trường :attribute phải có giá trị.',
    'gt' => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file' => ' :attribute phải lớn hơn :value kilobytes.',
        'string' => ' :attribute phải lớn hơn :value characters.',
        'array' => ' :attribute phải có nhiều hơn :value items.',
    ],
    'gte' => [
        'numeric' => ' :attribute phải lớn hơn hoặc bằng :value.',
        'file' => ' :attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string' => ' :attribute phải lớn hơn hoặc bằng :value characters.',
        'array' => ' :attribute phải có :value items trở lên.',
    ],
    'image' => ':attribute phải là ảnh.',
    'in' => 'Lựa chọn :attribute không hợp lệ.',
    'in_array' => 'Trường :attribute không tồn tại ở :other.',
    'integer' => ':attribute phải là số nguyên.',
    'ip' => ':attribute phải là địa chỉ IP hợp lệ.',
    'ipv4' => ':attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6' => ' :attribute phải là địa chỉ Ipv6 hợp lệ.',
    'json' => ':attribute phải là chuỗi JSON hợp lệ.',
    'lt' => [
        'numeric' => ':attribute phải nhỏ hơn :value.',
        'file' => ' :attribute phải nhỏ hơn :value kilobytes.',
        'string' => ' :attribute phải nhỏ hơn :value characters.',
        'array' => ' :attribute phải có ít hơn :value items.',
    ],
    'lte' => [
        'numeric' => ' :attribute phải nhỏ hơn hoặc bằng :value.',
        'file' => ' :attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string' => ' :attribute phải nhỏ hơn hoặc bằng :value characters.',
        'array' => ' :attribute không được nhiều hơn :value items.',
    ],
    'max' => [
        'numeric' => ' :attribute không lớn hơn :max.',
        'file' => ' :attribute không lớn hơn :max kilobytes.',
        'string' => ' :attribute không lớn hơn :max characters.',
        'array' => ' :attribute không thể có nhiều hơn :max items.',
    ],
    'mimes' => ' :attribute phải là loại file: :values.',
    'mimetypes' => ' :attribute phải là loại file: :values.',
    'min' => [
        'numeric' => ' :attribute phải ít nhất :min.',
        'file' => ' :attribute phải ít nhất :min kilobytes.',
        'string' => ' :attribute phải ít nhất :min characters.',
        'array' => 'The :attribute phải có ít nhất :min items.',
    ],
    'not_in' => 'Lựa chọn :attribute không hợp lệ.',
    'not_regex' => ' :attribute định đạng không hợp lệ.',
    'numeric' => ' :attribute phải là số.',
    'password' => 'Mật khaair không chính xác.',
    'present' => 'Trường :attribute phải là hiện tại.',
    'regex' => ':attribute định dạng không hợp lệ.',
    'required' => 'Trường :attribute là bắt buộc .',
    'required_if' => ' Trường :attribute là bắt buộc khi :other là :value.',
    'required_unless' => 'Trường :attribute là bắt buộc trừ khi :other trong :values.',
    'required_with' => 'Trường :attribute bắt bưộc :values là giá trị hiện tại.',
    'required_with_all' => 'Trường :attribute bắt buộc khi :values là giá trị hiện tại.',
    'required_without' => 'Trường :attribute bắt buộc khi :values không hiện hữu.',
    'required_without_all' => 'Trường :attribute bắt buộc khi không có :values hiện hữu.',
    'same' => ':attribute và :other phải giống.',
    'size' => [
        'numeric' => ':attribute phải là :size.',
        'file' => 'The :attribute phải là :size kilobytes.',
        'string' => 'The :attribute phải là :size characters.',
        'array' => 'The :attribute phải chữa :size items.',
    ],
    'starts_with' => ' :attribute phải bắt đầu với một trong các điều kiện: :values.',
    'string' => ' :attribute phải là chuỗi.',
    'timezone' => ' :attribute phải là khu vực hợp lệ.',
    'unique' => ' :attribute đã tồn tại.',
    'uploaded' => ' :attribute không upload được.',
    'url' => ' :attribute định dạng không phù hợp.',
    'uuid' => ' :attribute phải là UUID hợp lệ.',

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
