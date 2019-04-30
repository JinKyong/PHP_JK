# TableBoard_Shop
게시판-Shop 의 TODO 완성하기!

## 기존 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── insert.php - 게시글 작성 기능 구현
│   └── update.php - 게시글 수정 기능 구현
│   └── delete.php - 게시글 삭제 기능 구현
├── board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── index.php - 게시글 조회 기능 구현
```

## 수정 파일
```
 .
├── css - board_form.php와 index.php 에서 사용하는 stylesheet
│   └── ...
├── fonts - 폰트
│   └── ...
├── images - 아이콘 이미지
│   └── ...
├── vender - 외부 라이브러리
│   └── ...
├── js - board_form.php와 index.php 에서 사용하는 javascript
│   └── ...
├── function
│   └── (수정) insert.php - 게시글 작성 기능 구현
│   └── (수정) update.php - 게시글 수정 기능 구현
│   └── (수정) delete.php - 게시글 삭제 기능 구현
├── (수정) board_form.php - 게시글 작성/수정 시 사용하는 form이 포함된 php 파일
├── (수정) index.php - 게시글 조회 기능 구현
```

## MySQL 테이블 생성!

[여기에 테이블 생성 시, 사용한 Query 를 작성하세요.]
Note: create table tableboard_shop (
num int auto_increment,
date datetime,
order_id int,
name char(50),
price int,
quantity int,
primary key(num)
);
    
## index.php 수정
- body 태그 테이블 생성(출력)부분 수정
- mysql명령어를 통해 mysql의 테이블 레코드를 차례로 불러와서(반복문 사용) 출력한다.

## board_form.php 수정
- 코드 맨 처음에 mysql에서 GET형식으로 받아온 num값이 있으면 그와 일치하는 레코드를 찾는 부분 추가
- form 태그에 GET형식으로 받아온 num값이 있을경우 위에서 받은 레코드 값을 이용하여 form 형성(update 폼), 없을 시 그냥 form 생성(insert 폼)
- tr 태그(테이블 출력)에서 GET형식으로 받아온 num값이 있을경우 위에서 받은 레코드 값을 이용하여 update 폼에 기존의 값 출력, 없을 시 insert 폼에 빈칸 그대로 출력

## function
### insert.php 수정
- POST 형식으로 받아온 값들을 insert 명령어를 통해 mysql 테이블내에 레코드형태로 삽입
- 사용한 query문
- insert into tableboard_shop (date, order_id, name, price, quantity) values ('$_POST[date]', '$_POST[order_id]', '$_POST[name]', '$_POST[price]', '$_POST[quantity]');

### update.php 수정
- GET 형식으로 받아온 num값과 일치하는 레코드를 update 명령어를 통해 POST 형식으로 받아온 값들로 수정
- 사용한 query문
- update tableboard_shop set date = '$_POST[date]', order_id = '$_POST[order_id]', name = '$_POST[name]', price = '$_POST[price]', quantity = '$_POST[quantity]' where num = $_GET[num];

### delete.php 수정
- GET 형식으로 받아온 num값을 활용하여 delete 명령어를 사용, mysql 테이블내에 원하는 레코드를 삭제
- 사용한 query문
- delete from tableboard_shop where num = $_GET[num];
