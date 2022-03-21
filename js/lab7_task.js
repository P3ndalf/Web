let myCompute = {
    a: 1,
}

let target = null

class Dep {
    constructor() {
        this.subscribers = []
    }
    depend() {
        if (target && !this.subscribers.includes(target)) {
            this.subscribers.push(target)
        }
    }
    notify() {
        console.log('computing...')
        this.subscribers.forEach(sub => sub())
    }
}

Object.keys(myCompute).forEach(key => {
    let internalValue = myCompute[key]

    const dep = new Dep()

    Object.defineProperty(myCompute, key, {
        get(){
            dep.depend()
            return internalValue
        },
        set(newVal){
            internalValue = newVal
            dep.notify()
        }
    })
})

function watcher(myFunc){
    target = myFunc
    target()
    target = null
}

watcher(() => {
    console.log('computing...')
})

setInterval(() => { console.log(myCompute.a)},2000)