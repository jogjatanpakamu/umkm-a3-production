// 'use strict';

// importScripts('assets/js/db/idb-keyval-iife.min.js');

// const version = 8;
// var isOnline = true;
// var isLoggedIn = false;
// const cacheName = 'my-site-v1';

// var cacheFiles = [
//   '/client/',
//   '/client/assets/css/pages/filepond.css',
//   '/client/assets/extensions/filepond/filepond.js',
//   '/client/assets/extensions/jquery/jquery.min.js',
//   '/client/assets/extensions/simple-datatables/umd/simple-datatables.js',
//   '/client/assets/extensions/sweetalert2/sweetalert2.min.js',
//   '/client/assets/extensions/toastify-js/src/toastify.js',
//   '/client/assets/images/logo/favicon.png',
//   '/client/assets/images/logo/favicon.svg',
//   '/client/assets/images/produk/.p1.jpeg',
//   '/client/assets/images/produk/.p2.jpeg',
//   '/client/assets/images/produk/.p3.jpeg',
//   '/client/assets/js/db/idb-keyval-iife.min.js',
//   '/client/assets/js/main.js',
//   '/client/assets/js/pages/filepond.js',
//   '/client/assets/js/pages/simple-datatables.js',
//   '/client/assets/js/sweetalert2/sweetalert2.js',
//   '/client/manifest.json'
// ];

// self.addEventListener('install', onInstall);
// self.addEventListener('activate', onActivate);
// self.addEventListener('message', onMessage);
// self.addEventListener('fetch', onFetch);

// main().catch(console.error);

// async function main() {
//   await sendMessage({ requestStatusUpdate: true });
// }

// async function onInstall(event) {
//   console.log('[Service Worker] Install');
//   event.waitUntil(
//     (async () => {
//       const cache = await caches.open(cacheName);
//       console.log('[Service Worker] Caching all: app shell and content');
//       await cache.addAll(contentToCache);
//     })()
//   );
// }

// async function onActivate(event) {
//   event.waitUntil(handleActivation());
// }

// async function handleActivation(e) {
//   await clients.claim();
//   console.log(`[Service Worker] (${version}) activated.`);
// }

// async function sendMessage(msg) {
//   var allClients = await clients.matchAll({ includeUncontrolled: true });
//   return Promise.all(
//     allClients.map(function clientMsg(client) {
//       var chan = new MessageChannel();
//       chan.port1.onmessage = onMessage;
//       return client.postMessage(msg, [chan.port2]);
//     })
//   );
// }

// function onMessage({ data }) {
//   if (data.statusUpdate) {
//     ({ isOnline, isLoggedIn } = data.statusUpdate);
//     console.log(`[Service Worker] (v${version}) status update, isOnline:${isOnline}`);
//   }
// }

// async function onFetch(e) {
//   caches.match(e.request).then(function (response) {
//     if (response) {
//       return response;
//     }
//     return fetch(e.request);
//   });
// }
