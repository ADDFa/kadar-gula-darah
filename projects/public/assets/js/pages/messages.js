(()=>{"use strict";const e=e=>document.getElementById(`${e}`);e("send-message").addEventListener("click",(t=>{t.preventDefault();const{target:n}=t,{form:a}=n;fetch(`${origin}/messages`,{method:"POST",body:new FormData(a)}).then((e=>e.json())).then((t=>(t=>{s(t.id);const n=e("messages"),a=parseInt(n.dataset.userId)===parseInt(t.user_id),o=new Date(1e3*t.times),r=`${o.getHours()}.${o.getMinutes()}`;let i=a?"Saya":t.user.name;1===parseInt(t.is_dokter)&&(i=a?"Saya":`Dokter :  ${t.user.name}`),n.innerHTML+=`\n        <li class="list-group-item \n        list-group-item-${a?"success":"primary"}\n        d-flex flex-column\n        align-items-${a?"start":"end"}">\n            <span class="text-secondary" style="font-size: 12px">\n                ${i} | ${r}\n            </span>\n\n            ${t.message}\n        </li >\n        `})(t)))}));const s=e=>{const s=e??document.querySelector("[data-last-message]").dataset.lastMessage;sessionStorage.setItem("lastMessage",s)};setInterval((()=>{const e=sessionStorage.getItem("lastMessage");fetch(`${origin}/new/messages/${e}`).then((e=>e.json())).then((e=>{console.log(e)}))}),2e3),document.addEventListener("DOMContentLoaded",(()=>s()))})();