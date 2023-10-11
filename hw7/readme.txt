學號:109213015  姓名:呂慧淇

資料庫設置:
資料庫名稱->hw7
使用者名稱->root
主機名稱->本機(localhost)
密碼->無

各個檔案的說明:
joinform.html->填寫加入會員的表單
join.php->檢查是否加入成功
loginform.html->登入的表單
login.php->檢查是否登入成功
alldata.php->可以查看自己的資料
update2.php->填寫更改資料的表單
updateCheck.php->更改資料以及檢查是否更改成功
connmysql.php->連接資料庫
hw7.sql->匯出的資料庫

流程:
1.先填寫加入會員表單(joinform.html),填寫之後會傳到join.php檢查是否加入成功,
  若已經是會員可以點選登入跳至登入表單
2.登入(loginform.html),填寫後傳到login.php檢查是否登入成功,
  成功後會出現可以查看資料的連結(連到alldata.php),
  失敗則會出現重新登入的連結(連到loginform.html)
3.登入後查看個人資料,裡面提供修改資料的功能,
  點選後會出現原本的資料,可隨意修改
  提供修改密碼欄位,無要修改可直接忽略
  修改成功則重新登入(連到loginform.html)查看資料,若更改密碼記得以新密碼登入
  修改失敗則重新登入修改

由於會員密碼存為雜湊,以下提供sql檔內資料的明碼:
名稱:白易辰 帳號:s2521 密碼:2521  
名稱:始祖鳥 帳號:s123456 密碼:123456
名稱:羅希度 帳號:slove2521 密碼:love2521
名稱:白易辰 帳號:a2521 密碼:abc2521  
名稱:安妮亞 帳號:anyasocute 密碼:anya123
名稱:黃昏 帳號:sloyid123 密碼:loyid123
名稱:約兒 帳號:syour123 密碼:your


聯絡資訊:(學校信箱) s109213015@mail1.ncnu.edu.tw
