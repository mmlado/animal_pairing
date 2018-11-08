from django.db import models

class Animal(models.Model):
    father = models.ForeignKey("self", null = True, on_delete = models.SET_NULL, related_name = "child_father")
    mother = models.ForeignKey("self", null = True, on_delete = models.SET_NULL, related_name = "child_mother")
    name = models.CharField(max_length = 100)
    dob = models.IntegerField()
    active = models.BooleanField()
    own = models.BooleanField()
