// 定数定義
const SAVE_URL = 'https://d4871bb1317d47ea82c1816fa5381b3a.vfs.cloud9.ap-southeast-2.amazonaws.com/scar.php';
const IMAGE_URL = 'https://d4871bb1317d47ea82c1816fa5381b3a.vfs.cloud9.ap-southeast-2.amazonaws.com/image';

// ページの読み込みが完了したらコールバック関数が呼ばれる
window.addEventListener('load', () => {
    const canvas = document.querySelector('#draw-area');
    const context = canvas.getContext('2d');
    const lastPosition = { x: null, y: null };
    let isDrag = false;

    function draw(x, y) {
        if (!isDrag) {
            return;
        }

        context.lineCap = 'round';
        context.lineJoin = 'round';
        context.lineWidth = 3;
        context.strokeStyle = 'red';

        if (lastPosition.x === null || lastPosition.y === null) {
            context.moveTo(x, y);
        } else {
            context.moveTo(lastPosition.x, lastPosition.y);
        }

        context.lineTo(x, y);
        context.stroke();

        lastPosition.x = x;
        lastPosition.y = y;
    }

    function clear() {
        context.clearRect(0, 0, canvas.width, canvas.height);
    }

    function dragStart(event) {
        context.beginPath();
        isDrag = true;
    }

    function dragEnd(event) {
        context.closePath();
        isDrag = false;
        lastPosition.x = null;
        lastPosition.y = null;
    }

    function initEventHandler() {
        const clearButton = document.querySelector('#clear-button');
        clearButton.addEventListener('click', clear);

        canvas.addEventListener('mousedown', dragStart);
        canvas.addEventListener('mouseup', dragEnd);
        canvas.addEventListener('mouseout', dragEnd);
        canvas.addEventListener('mousemove', (event) => {
            draw(event.layerX, event.layerY);
        });
    }

    initEventHandler();
    
    
  //---------------------------------------------
  // 保存ボタンが押されたらサーバへ送信する
  //---------------------------------------------
  document.querySelector("#btn-send").addEventListener("click", ()=>{
    // Canvasのデータを取得
    const canvas = document.querySelector('#draw-area');
    const canvasData = canvas.toDataURL('image/png');// DataURI Schemaが返却される

    // 送信情報の設定
    const param  = {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      },
      body: JSON.stringify({data: canvasData})
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
      fetch(SAVE_URL , param)
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

    
    
  //---------------------------------------------
  // 保存ボタンが押されたらサーバへ送信する
  //---------------------------------------------
  document.querySelector("#btn-send").addEventListener("click", ()=>{
    // Canvasのデータを取得
    const canvas = document.querySelector('#draw-area');
    const canvasData = canvas.toDataURL('image/png');// DataURI Schemaが返却される

    // 送信情報の設定
    const param  = {
      method: "POST",
      headers: {
        "Content-Type": "application/json; charset=utf-8"
      },
      body: JSON.stringify(canvasData)
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


    // ボタンクリック時のイベント処理を追加
    const btnSave = document.getElementById('btn-send');
    btnSave.addEventListener('click', post);

    function post() {
        const dataURL = canvas.toDataURL('image/png');
        const requestData = { data: dataURL };

        fetch(SAVE_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8',
            },
            body: JSON.stringify(requestData),
        })
        .then(response => response.json())
        .then(data => {
            // サーバーからの応答を処理
            console.log(data);
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
});
