document.addEventListener('DOMContentLoaded', function(){
    async function renderCalendar(){
        const currentDate = document.querySelector('#current-date'),
        daysElem = document.querySelector('.days'),
        prevNextMonth = document.querySelectorAll('#switchDates span');
        let date = new Date();
        currYear = date.getFullYear();
        currMonth = date.getMonth();
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']
        const adjustCalendar = () =>{
            let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
            lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
            lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
            lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
            let listElem = '';
            
            for (let i = firstDayofMonth; i > 0; i--) {
                let li = document.createElement('li');
                li.innerText = `${lastDateofLastMonth - i + 1}`;
                li.classList.add('inactive');
                listElem += li.outerHTML;
            }
            
            
            for(let i = 1; i <= lastDateofMonth; i++){
                let isToday = i === date.getDate() && currMonth === new Date().getMonth()
                                    && currYear === new Date().getFullYear() ? "active" : "";
                let li = document.createElement('li');
                li.innerText = `${i}`; // Use innerText to set the content
                if (isToday) {
                    li.classList.add('current-day');
                }
                li.classList.add('${isToday}'); // Use classList.add to add the class
                listElem += li.outerHTML; // Append the HTML of the created element to listElem
            }
            
            for(let i = lastDayofMonth; i < 6; i++){
                let li = document.createElement('li');
                li.innerText = `${i - lastDayofMonth + 1}`; // Use innerText to set the content
                li.classList.add('inactive'); // Use classList.add to add the class
                listElem += li.outerHTML; // Append the HTML of the created element to listElem
            }

            currentDate.innerText = `${months[currMonth]} ${currYear}`;
            daysElem.innerHTML = listElem;
        }
        adjustCalendar();
        prevNextMonth.forEach(switchDates => {
            switchDates.addEventListener('click', () => {
                if (switchDates.id === 'prev') {
                    currMonth -= 1;
                    if (currMonth < 0) {
                        currYear -= 1;
                        currMonth = 11; // December
                    }
                } else {
                    currMonth += 1;
                    if (currMonth > 11) {
                        currYear += 1;
                        currMonth = 0; // January
                    }
                }
                adjustCalendar();
            });
        });
        
    };
    renderCalendar();
});
