<?php

return [
    'html' => [
        'sign_in' => 'Đăng Nhập',
        'first_name' => 'Họ',
        'last_name' => 'Tên',
        'email' => 'Hộp thư',
        'password' => 'Mật khẩu',
        'new_password' => 'Mật khẩu mới',
        'password_confirm' => 'Xác nhận mật khẩu',
        'see_you_again' => 'Rất vui được gặp lại bạn',
        'remember' => 'Ghi nhớ',
        'forgot_password' => 'Quên mật khẩu ?',
        'not_account' => 'Chưa có tài khoản ?',
        'create_account' => 'Tạo tài khoản',
        'register' => 'Đăng kí',
        'join_step' => 'Tham gia với chúng tôi ngay hôm nay! Chỉ mất vài bước',
        'accept' => 'Chấp nhận',
        'term_condition' => 'Các điều khoản và điều kiện',
        'has_account' => 'Bạn đã có tài khoản ?',
        'forgot' => 'Forgot Password',
        'forgot_logan' => 'We will send you a link to reset password.',
        'reset' => 'Reset Password',
        'reset_logan' => 'Almost done. Enter your new password, and you\'re good to go.',

        'btn' => [
            'forgot' => 'Reset Password',
        ],
    ],

    'messages' => [
        'confirms' => [
            'subject' => 'Register Confirmation',
            'body' => 'Your registration is completed. Please click link to get access',
            'check_email' => 'Confirmation email has been send. Please check your email',
            'completed' => 'Your activation is completed',
            'confirm_email' => 'Please confirm your email',
        ],
        'passwords' => [
            'user' => 'We can\'t find a user with that e-mail address',
            'token' => 'This password reset token is invalid',
            'reset' => 'Your password has been reset',
            'sent' => 'We have e-mailed your password reset link',
        ],
        'auth' => [
            'failed' => 'These credentials do not match our records',
            'token_invalid' => 'This activation token is invalid',
            'unauthorized' => 'Ủy quyền',
            'unauthorized_access' => 'Bạn không có quyền thích hợp để truy cập',
            'unauthenticated' => 'Xác thực',
            'success' => 'Thay đổi mật khẩu thành công',
            'btn_name' => 'Xác nhận đã đăng ký',
        ],
        'forgot' => [
            'subject' => 'Reset Password Notification',
            'body' => 'You are receiving this email because we received a password reset request for your account.',
            'btn_name' => 'Reset Password',
        ],
        'reset' => [
            'subject' => 'Password Reset Success',
            'body' => 'You have reset your password successfully.',
            'token_not_found' => 'Token not found',
        ],
        'login' => [
            'success' => 'Logged in successfully',
        ],
    ],

    'validations' => [
        'required' => 'Vui lòng nhập :attribute',
        'string' => ':attribute phải là chuỗi',
        'max' => [
            'numeric' => '[vi]The :attribute may not be greater than :max',
            'file'    => '[vi]The :attribute may not be greater than :max kilobytes',
            'string'  => ':attribute không được lớn hơn :max kí tự',
            'array'   => '[vi]The :attribute may not have more than :max items',
        ],
        'min' => [
            'numeric' => '[vi]The :attribute must be at least :min',
            'file'    => '[vi]The :attribute must be at least :min kilobytes',
            'string'  => ':attribute phải có ít nhất :min kí tự',
            'array'   => '[vi]The :attribute must have at least :min items',
        ],
        'email' => ':attribute không hợp lệ',
        'unique' => ':attribute đã được đăng ký',
        'confirmed' => ':attribute xác nhận không trùng khớp',
        'password_regex' => 'Mật khẩu có thể có các ký tự chữ và số, cũng như các ký hiệu [. - _]',
    ],

    'page_title' => [
        'login' => 'Đăng Nhập',
        'register' => 'Đăng Ký',
        'forgot' => 'Quên mật khẩu',
        'reset' => 'Khôi phục mật khẩu',
    ],
];
