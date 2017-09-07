<?php
$stringA="appid=wxb5e3b7eacdee3bf5&attach=啊啊啊啊啊啊&bank_type=CFT&cash_fee=3&fee_type=CNY&is_subscribe=Y&mch_id=1486899232&nonce_str=g70q1thf16th1q1zub72vgd9a9zcfyef&openid=of_98w6mHCFd-izbWD8exPam9ZzQ&out_trade_no=148689923220170826101002&result_code=SUCCESS&return_code=SUCCESS&time_end=20170826101016&total_fee=3&trade_type=NATIVE&transaction_id=4008562001201708268303851804";
$stringSignTemp=$stringA."&key=agRdDwIm8swUMxZDQuIIsnelhVLjFHn7";
$sign=strtoupper(MD5($stringSignTemp));


//&sign_type=RSA2

$ali ="total_amount=0.01&timestamp=2017-08-30+21%3A44%3A54&trade_no=2017083021001004080220587305&sign_type=RSA2&auth_app_id=2017080408033524&charset=UTF-8&seller_id=2088721701218441&method=alipay.trade.page.pay.return&app_id=2017080408033524&out_trade_no=201708302144359264&version=1.0";

$yao = "&sign=aXUvgvSMl2suo5G7eBKjSPdMePBhA31JbScdVSUWedA4u%2B3aHzbphXI%2FPv2f4etaSQtffKqZ91ZZrVft%2FeSAVCH0Oj%2BS8UQmSX%2BIN3JyJxTwSpRU2fF4MuQGnMJb5N89ReqpfBgfFPXldzwPAHBG9mP4V5Vrrb%2FBBSRDLy1m4FZ%2FChn96K%2FP8ahTB9bD%2Brfl2K3cxkyjhGJD%2FqJ%2BTyO1zp%2FXjaXzt%2ByPNi%2BziNrGAjWeiRmKWsASiRgOpUD1RypcfkcJ50vQdyKgh8aKEVE%2BXruLghcc7pBh8Y0vWaiICMJoeuZjIKfJ30%2FxjQ2m7Emuyi%2FpUn%2FhkUJ%2F9%2FxOXMHErg%3D%3D";
$ss = "aXUvgvSMl2suo5G7eBKjSPdMePBhA31JbScdVSUWedA4u%2B3aHzbphXI%2FPv2f4etaSQtffKqZ91ZZrVft%2FeSAVCH0Oj%2BS8UQmSX%2BIN3JyJxTwSpRU2fF4MuQGnMJb5N89ReqpfBgfFPXldzwPAHBG9mP4V5Vrrb%2FBBSRDLy1m4FZ%2FChn96K%2FP8ahTB9bD%2Brfl2K3cxkyjhGJD%2FqJ%2BTyO1zp%2FXjaXzt%2ByPNi%2BziNrGAjWeiRmKWsASiRgOpUD1RypcfkcJ50vQdyKgh8aKEVE%2BXruLghcc7pBh8Y0vWaiICMJoeuZjIKfJ30%2FxjQ2m7Emuyi%2FpUn%2FhkUJ%2F9%2FxOXMHErg%3D%3D";
print_r((base64_decode($ss)));





























