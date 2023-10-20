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
