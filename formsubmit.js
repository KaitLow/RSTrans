/*

 19FA-SWDV-131-001-Web Styling
 
 Author: Kait Low
 Date: 8/22/2019

 LAST MODIFIED: 9/12/2019
 
 Version: 1
 
 Filename: formsubmit.js
 
Form submit pop-up
 
*/


window.onload = setForm;

function setForm() {
   document.forms[0].onsubmit = function() {
      if (this.checkValidity()) alert("Thank you for your feedback!");
      return false;
   }
}