# 기말 대체 과제 : 전국 공공 화장실 찾기    
<img width="446" alt="홈화면" src="https://user-images.githubusercontent.com/70579620/102014111-a60a9700-3d97-11eb-8063-57d60a3cde92.PNG">   

## 역할분담   
  + 김은지 : 서버 호스팅, 공공데이터 csv파일 DB서버에 삽입, 테이블 설계 및 생성
  + 류난영 : 소개 자료 작성
  + 송세정
  + 유채희 : 서울시 화장실 찾기 메뉴 구현, 소개 자료 작성
  + 이지민 : 후기 게시판 구현

## 홈페이지 주소     
  http://dbp2020.dothome.co.kr/    
## 구축환경    
  + Mysql
  + PHP
  + Apache
  + 호스팅 : Dothome   

## 데이터 출처   
  공공데이터포털   
  https://www.data.go.kr/data/15012892/standard.do   

## 프로젝트 목적   
  사람들이 급하게 화장실을 찾는 경우가 있는데 요즘 건물내에 화장실들은 잠금이 설치되어있어 당혹스러울 경우가 있다.    
  그래서 공중화장실 위치를 찾아주는 웹이 있다면 편리하지 않을까 하는 생각에 만들게 되었다.   
  이것은 그 지역을 처음 방문하는 사람들, 외국인 등등 여러 사람들에게 도움이 될 것이라고 생각했다.    
  따라서 공중화장실, 개방화장실을 비롯하여 자신이 원하는 지역으로 검색하는 기능을 추가하여 검색을 편리하게 하였고    
  후기를 남길 수 있는 게시판을 만들어 여러 사람들의 의견을 나눌 수 있는 공간을 추가하였다.    

## 기능 소개   

### 1. 공중화장실 찾기    

<img width="879" alt="1" src="https://user-images.githubusercontent.com/70579620/102013896-4790e900-3d96-11eb-9fdf-09d8783230c9.PNG">   

```sql
SELECT * FROM `public_toilet` WHERE `구분` = '공중화장실'   
```
데이터들 중에서 공중화장실로 등록되어있는 화장실의 주소, 전화번호 등의 정보를 확인할 수 있다.   

### 2. 개방화장실 찾기   
<img width="898" alt="2" src="https://user-images.githubusercontent.com/70579620/102013937-7909b480-3d96-11eb-9dbd-f508107da720.PNG">   

```sql
SELECT * FROM `public_toilet` WHERE `구분` = '개방화장실'   
```    
데이터들 중에서 개방화장실로 등록되어 있는 화장실의 주소, 전화번호 등의 정보를 확인할 수 있다.

### 3. 서울시에 있는 공공화장실 찾기    
<img width="901" alt="서울" src="https://user-images.githubusercontent.com/70579620/102014004-03eaaf00-3d97-11eb-8b59-700a8b1d9cf2.PNG">   


```sql
SELECT * FROM `public_toilet` WHERE `소재지도로명주소` LIKE '%서울특별시%'
```
도로명 주소에 '서울시'가 포함된 공공 화장실을 모두 출력한다.   

### 4. 화장실 명, 도로명 주소, 지번 주소로 검색하기    
<img width="310" alt="3검색" src="https://user-images.githubusercontent.com/70579620/102013943-86bf3a00-3d96-11eb-91e1-a6828eeab49f.PNG">    
<img width="893" alt="3결과" src="https://user-images.githubusercontent.com/70579620/102013959-a6eef900-3d96-11eb-9fd3-282bfb7839ad.PNG">     

```sql
SELECT * FROM public_toilet WHERE `{$filtered_category}` LIKE '%{$filtered_content}%'
```    
'구분','화장실명', '도로명주소', '지번주소' 네 개의 목록 중 하나를 선택하고 검색어를 입력하면 그에 해당하는 정보가 출력된다.    

### 5. 후기 게시판    

<img width="896" alt="4 후기게시판" src="https://user-images.githubusercontent.com/70579620/102013946-8f177500-3d96-11eb-8217-288c6c4d8f9f.PNG">   

board라는 데이터베이스를 생성하여 id(게시물번호), name(작성자), title(제목), date(작성날짜와시간), contents(내용), view(조회수)를 넣어 게시판을 제작하였다.    
'글쓰기'를 write.php로 연결되어 작성자, 제목, 내용의 작성칸이 뜨고 '글 작성'을 누르면 write_ok.php로 넘어가 board에 입력한 내용이 등록된다.    
