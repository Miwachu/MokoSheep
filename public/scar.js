//---------------------------------------------
// 定数定義
//---------------------------------------------
// 保存を行うプログラムがあるURL
const SAVE_URL = 'http://example.com/receive.php';

// 画像が保存されているURL
const IMAGE_URL = 'http://example.com/image';

// ページの読み込みが完了したらコールバック関数が呼ばれる
// ※コールバック: 第2引数の無名関数(=関数名が省略された関数)
window.addEventListener('load', () => {
  const canvas = document.querySelector('#draw');
  // contextを使ってcanvasに絵を書いていく
  const context = canvas.getContext('2d');

  // 直前のマウスのcanvas上のx座標とy座標を記録する
  const lastPosition = { x: null, y: null };

  // マウスがドラッグされているか(クリックされたままか)判断するためのフラグ
  let isDrag = false;

  // 絵を書く
  function draw(x, y) {
    // マウスがドラッグされていなかったら処理を中断する。
    // ドラッグしながらしか絵を書くことが出来ない。
    if(!isDrag) {
      return;
    }

    // 「context.beginPath()」と「context.closePath()」を都度draw関数内で実行するよりも、
    // 線の描き始め(dragStart関数)と線の描き終わり(dragEnd)で1回ずつ読んだほうがより綺麗に線画書ける

    // 線の状態を定義する
    // MDN CanvasRenderingContext2D: https://developer.mozilla.org/en-US/docs/Web/API/CanvasRenderingContext2D/lineJoin
    context.lineCap = 'round'; // 丸みを帯びた線にする
    context.lineJoin = 'round'; // 丸みを帯びた線にする
    context.lineWidth = 5; // 線の太さ
    context.strokeStyle = 'red'; // 線の色

    // 書き始めは lastPosition.x, lastPosition.y の値はnullとなっているため、
    // クリックしたところを開始点としている。
    // この関数(draw関数内)の最後の2行で lastPosition.xとlastPosition.yに
    // 現在のx, y座標を記録することで、次にマウスを動かした時に、
    // 前回の位置から現在のマウスの位置まで線を引くようになる。
    if (lastPosition.x === null || lastPosition.y === null) {
      // ドラッグ開始時の線の開始位置
      context.moveTo(x, y);
    } else {
      // ドラッグ中の線の開始位置
      context.moveTo(lastPosition.x, lastPosition.y);
    }
    // context.moveToで設定した位置から、context.lineToで設定した位置までの線を引く。
    // - 開始時はmoveToとlineToの値が同じであるためただの点となる。
    // - ドラッグ中はlastPosition変数で前回のマウス位置を記録しているため、
    //   前回の位置から現在の位置までの線(点のつながり)となる
    context.lineTo(x, y);

    // context.moveTo, context.lineToの値を元に実際に線を引く
    context.stroke();

    // 現在のマウス位置を記録して、次回線を書くときの開始点に使う
    lastPosition.x = x;
    lastPosition.y = y;
  }

  // canvas上に書いた絵を全部消す
  function clear() {
    context.clearRect(0, 0, canvas.width, canvas.height);
  }

  // マウスのドラッグを開始したらisDragのフラグをtrueにしてdraw関数内で
  // お絵かき処理が途中で止まらないようにする
  function dragStart(event) {
    // これから新しい線を書き始めることを宣言する
    // 一連の線を書く処理が終了したらdragEnd関数内のclosePathで終了を宣言する
    context.beginPath();

    isDrag = true;
  }
  // マウスのドラッグが終了したら、もしくはマウスがcanvas外に移動したら
  // isDragのフラグをfalseにしてdraw関数内でお絵かき処理が中断されるようにする
  function dragEnd(event) {
    // 線を書く処理の終了を宣言する
    context.closePath();
    isDrag = false;

    // 描画中に記録していた値をリセットする
    lastPosition.x = null;
    lastPosition.y = null;
  }

  // マウス操作やボタンクリック時のイベント処理を定義する
  function initEventHandler() {
    const clearButton = document.querySelector('#clear-button');
    clearButton.addEventListener('click', clear);

    canvas.addEventListener('mousedown', dragStart);
    canvas.addEventListener('mouseup', dragEnd);
    canvas.addEventListener('mouseout', dragEnd);
    canvas.addEventListener('mousemove', (event) => {
      // eventの中の値を見たい場合は以下のようにconsole.log(event)で、
      // デベロッパーツールのコンソールに出力させると良い
      // console.log(event);

      draw(event.layerX, event.layerY);
    });
  }
  //---------------------------------------------
  // 保存ボタンが押されたらサーバへ送信する
  //---------------------------------------------
  document.querySelector("#btn-send").addEventListener("click", ()=>{
    // Canvasのデータを取得
    const canvas = draw.toDataURL("image/png");  // DataURI Schemaが返却される

    // 送信情報の設定
    const param  = {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      },
      body: JSON.stringify({data: canvas})
    };

    // サーバへ送信
    sendServer(SAVE_URL, param);
  });
  /**
 * サーバへJSON送信
 *
 * @param url   {string} 送信先URL
 * @param param {object} fetchオプション
 */
function sendServer(url, param){
  fetch(url, param)
    .then((response)=>{
      return response.json();
    })
    .then((json)=>{
      if(json.status){
        alert("送信に『成功』しました");
        setImage(json.result);    //json.resultにはファイル名が入っている
      }
      else{
        alert("送信に『失敗』しました");
        console.log(`[error1] ${json.result}`);
      }
    })
    .catch((error)=>{
      alert("送信に『失敗』しました");
      console.log(`[error2] ${error}`);
    });
}

/**
 * サーバ上の画像を表示する
 *
 * @param path {string} 画像のURL
 * @return void
 */
function setImage(path){
  const url = `${IMAGE_URL}/${path}`;
  const result = document.querySelector("#result");
  const li = document.createElement("li");
  li.innerHTML = `<a href="${url}" target="_blank" rel="noopener noreferrer"><img src="${url}" class="saveimage"></a>`;
  result.insertBefore(li, result.firstChild);
}


  // イベント処理を初期化する
  initEventHandler();
});