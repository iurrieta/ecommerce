/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// identity function for calling harmory imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmory exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		Object.defineProperty(exports, name, {
/******/ 			configurable: false,
/******/ 			enumerable: true,
/******/ 			get: getter
/******/ 		});
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ function(module, exports) {

eval("$.fn.editable.defaults.mode = 'inline'\n$.fn.editable.defaults.ajaxOptions = {type: 'PUT'};\n\n$(document).ready(function () {\n    $(\".set-guide-number\").editable();\n\n    $(\".select-status\").editable({\n        source: [\n            {value: \"creado\", text: \"Creado\"},\n            {value: \"enviado\", text: \"Enviado\"},\n            {value: \"recibido\", text: \"Recibido\"}\n        ]\n    });\n});//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiMC5qcyIsInNvdXJjZXMiOlsid2VicGFjazovLy9yZXNvdXJjZXMvYXNzZXRzL2pzL2FwcC5qcz84YjY3Il0sInNvdXJjZXNDb250ZW50IjpbIiQuZm4uZWRpdGFibGUuZGVmYXVsdHMubW9kZSA9ICdpbmxpbmUnXG4kLmZuLmVkaXRhYmxlLmRlZmF1bHRzLmFqYXhPcHRpb25zID0ge3R5cGU6ICdQVVQnfTtcblxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoXCIuc2V0LWd1aWRlLW51bWJlclwiKS5lZGl0YWJsZSgpO1xuXG4gICAgJChcIi5zZWxlY3Qtc3RhdHVzXCIpLmVkaXRhYmxlKHtcbiAgICAgICAgc291cmNlOiBbXG4gICAgICAgICAgICB7dmFsdWU6IFwiY3JlYWRvXCIsIHRleHQ6IFwiQ3JlYWRvXCJ9LFxuICAgICAgICAgICAge3ZhbHVlOiBcImVudmlhZG9cIiwgdGV4dDogXCJFbnZpYWRvXCJ9LFxuICAgICAgICAgICAge3ZhbHVlOiBcInJlY2liaWRvXCIsIHRleHQ6IFwiUmVjaWJpZG9cIn1cbiAgICAgICAgXVxuICAgIH0pO1xufSk7XG5cblxuLy8gV0VCUEFDSyBGT09URVIgLy9cbi8vIHJlc291cmNlcy9hc3NldHMvanMvYXBwLmpzIl0sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwic291cmNlUm9vdCI6IiJ9");

/***/ }
/******/ ]);