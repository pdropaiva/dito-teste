db.createUser({
  user: 'dito',
  pwd: 'dito123',
  roles: [
    {
      role: "dbOwner",
      db: "dito"
    }
  ]
},
{
    w: "majority",
    wtimeout: 5000
});
db = db.getSiblingDB('dito');
db.createCollection("test");
