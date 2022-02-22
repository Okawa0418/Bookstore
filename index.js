// const form = document.getElementById("form");
// const input = document.getElementById("input");
// const ul = document.getElementById("ul");
// // localstrageからデータを取得　key指定　json 配列を戻す
// // 名前変更
// const memos = JSON.parse(localStorage.getItem("memos"))
// ;
// //  memos　が空白ではない場合li tag追加
// if(memos) {
//     memos.forEach(memo => {
//       add(memo);  
//     });
// }

// //homeメソッドとしてaddlisnerを定義　
// form.addEventListener("submit", function (event) {
//     event.preventDefault();
//     add();
// });

// // memos引数取得
// function add(memo) {
//     let memoText = input.value;

//     // memo push 対応　memoの値が
//     if(memo) {
//     memoText = memo.text;
//     }

//     if (memoText) {
//         const li = document.createElement("li");
//         li.innerText = memoText;
//         li.classList.add("list-group-item");

//         if(memo && memo.completed ) {
//         li.classList.add("text-decoration-line-through");
//         }

//         // 削除機能イベントリスナー　
//         li.addEventListener("contextmenu", function
//         (event) {
//             // 右クリック時の情報遮断
//             event.preventDefault();
//             li.remove();
//             saveData();
//         });

//         li.addEventListener("click", function () {
//             li.classList.toggle("text-decoration-line-through");
//             saveData();
//         });

//         ul.appendChild(li);
//         input.value ="";
//         saveData();
//     }
// }

// function saveData() {
//     const lists =document.querySelectorAll("li");
//     // console.log(lists);
//     let memos = [];

//     lists.forEach(list => {
//         // 完了状態を含め取得
//         let memo = {
//             text: list.innerText,
//             compiled: list.classList.contains("text-decoration-line-through")
//         };
//         // Push memo
//         memos.push(memo);
//     });
//     localStorage.setItem("memos", JSON.stringify(memos));
// }