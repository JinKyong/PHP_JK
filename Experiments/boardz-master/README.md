# boardz
게시판 검색 기능 완성하기

## 기존 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.html
```

## 추가 및 수정된 파일
```
 .
├── css
│   └── style.css
├── src
│   └── boardz.css
├── board.php (수정)
```

## board.php (수정)
- php 코드를 통해 mysql 함수 사용

- Select query문을 통해 검색 기능 구현
Select * from boardz where title like '%$_GET[search]%';

- 페이지 이미지 출력부분에서 swtich문과 for문을 통해 출력할 이미지 갯수에 따라 다르게 출력
사용함수
mysql_num_rows() : 검색 텍스트에 부합하는 이미지 갯수 파악
(출력해야할 이미지 개수) / (출력해야할 열 갯수) 를 통해 한 열에 몇 개의 이미지를 넣을지 결정하고 반복문을 통해 구현
