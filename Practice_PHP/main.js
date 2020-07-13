'use strict';

let h1 = document.getElementById('h1');
let h2 = document.getElementById('h2');
let guitar = document.querySelector('.guitar');

h1.addEventListener('click', () => {
  h1.textContent = 'WELCOME TO the WORLD!!';
  h1.style.color = 'orange';
  h1.style.fontSize = '36px';
});

h2.addEventListener('click', () => {
  document.getElementById('p').textContent = 'HELLO WORLD!! AGAIN!!!';
});

guitar.addEventListener('click', () => {
  guitar.style.color = 'pink';
  guitar.style.fontSize = '32px';
  guitar.style.backgroundColor = 'blue';
})

//  メールテンプレート

let createMail = (recv,bill) => {
  let msg = `${recv}様\nPT企画の斎藤です。\n今月の請求額は${bill}円です。`;
  console.log(msg);
};

//手数料の関数
let addCharge = (bill) => {
  return bill * 1.07;
};

//送付先データ
let data = [
  {name:'山本', bill:40000, crg:true},
  {name:'吉田', bill:25000, crg:false},
  {name:'丸本', bill:5000, crg:true},
];

//メール作成実行
for(let rec of data) {
  let bill = rec['bill'];
  if(rec['crg']) {
    bill = addCharge(bill);
  }
  createMail(rec['name'],bill);
};

