from django.db import models

class Animal(models.Model):
    MALE = 'male'
    FEMALE = 'female'

    GENDER_CHOICES = ((MALE, 'Male'), (FEMALE, 'Female'))

    father = models.ForeignKey("self", null = True, on_delete = models.SET_NULL, related_name = "child_father")
    mother = models.ForeignKey("self", null = True, on_delete = models.SET_NULL, related_name = "child_mother")
    name = models.CharField(max_length = 100)
    dob = models.IntegerField()
    gender = models.CharField(max_length = 6, choices = GENDER_CHOICES, default = FEMALE)
    active = models.BooleanField()
    own = models.BooleanField()

    class Meta:
        unique_together = ("name", "dob")
