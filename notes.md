##THREE PRINCIPLES OF redux

### I.SINGLE SOURCE OF TRUTH:
> The State of your whole application is stored in an object tree within a single store.

### II. STATE IS READ-ONLY
> The only way to change the state is to emit an Action.

### III. CHANGES ARE MADE WITH PURE FUNCTIONS :
> Reducer have to be pure-functions.

---

## IMMUTABILITY OF THE STATE

### I. WHEN MAKING OPERATIONS WITH ARRAYS:
> DO NOT USE mutable methods.
> USE: concat(), slice() or ...spread operator.

### II. WHEN MAKING OPERATIONS WITH OBJECTS
> USE: Object.Assign() or ...spread operator
