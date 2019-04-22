<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.min.js" ></script>
    <script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>
</head>
<body>

    <main class="container mx-auto py-4">
        <h1>iamport test</h1>

        <ul>
            @foreach ($iamport as $item)
                <li class="text-sm text-red">{{ $item }}</li>
            @endforeach
        </ul>

        <form action="/iamport/billing" method="POST" name="iamport">
            @csrf

            <input type="text" name="price" id="price" placeholder="price" value="1200" class="input bg-transparent border border-grey-light rounded p-2 text-xs w-full">
            <button type="button" class="button" onclick="call();">결제</button>

        </form>
    </main>

    <script>

        $(function () {
            var IMP = window.IMP;
            IMP.init('imp68124833');
        });

        function call () {
            var price = $('#price').val();

            IMP.request_pay({
                pg : 'kakaopay', // version 1.1.0부터 지원.
                pay_method : 'card',
                merchant_uid : 'merchant_' + new Date().getTime(),
                name : '주문명:결제테스트',
                amount : price,
                buyer_email : 'iamport@siot.do',
                buyer_name : 'wiz',
                buyer_tel : '010-1234-5678',
                buyer_addr : '서울특별시 강남구 삼성동',
                buyer_postcode : '123-456',
                m_redirect_url : 'https://www.yourdomain.com/payments/complete'
            }, function(rsp) {
                if ( rsp.success ) {
                    var msg = '결제가 완료되었습니다.';
                    msg += '고유ID : ' + rsp.imp_uid;
                    msg += '상점 거래ID : ' + rsp.merchant_uid;
                    msg += '결제 금액 : ' + rsp.paid_amount;
                    msg += '카드 승인번호 : ' + rsp.apply_num;
                } else {
                    var msg = '결제에 실패하였습니다.';
                    msg += '에러내용 : ' + rsp.error_msg;
                }
                alert(msg);
            });
        }
    </script>

</body>
</html>
